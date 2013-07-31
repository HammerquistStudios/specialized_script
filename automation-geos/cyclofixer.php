<?php

  $src_files = Array();

  $a = opendir(".");

  while($b = readdir($a))
    {
      if ($p = strpos($b,"CycloXML"))
        {
          $src_files[] = trim(substr($b,strpos($b, "_")+1));
        }
    }

  closedir($a);

  foreach ($src_files AS $F)
    {
      $cyclo_images = Array();
      $bike_images = Array();

      // ---- First up, the cyclo file
    
      $xml_cyclo = new SimpleXMLElement(file_get_contents("SEBikeCycloXML_$F"));
      
      $images = $xml_cyclo->bike->families->family->images;
      
      foreach ($xml_cyclo->bike->families->family->images->image AS $i)
        {
          $cyclo_images[] = (string)$i["href"];
        }
      
      // ---- Next, the paired bike file
    
      $xml_bike = new SimpleXMLElement(file_get_contents("SEBikeDigitalXML_$F"));
    
      $products = $xml_bike->bikes->categories->category->products;
      
      foreach ($products->product AS $p)
        {
          foreach ($p->images->image AS $i)
            {
              $bike_images[] = (string)$i["href"];
            }
        }
    
      // -- Now the magic
      
      // 1. Check to see the cyclo's first images is the very first IMG in bike
      // 2. Remaining cyclo images are alphabetic
      
      if ($cyclo_images[0] != $bike_images[0])
        {
          $xml_cyclo->bike->families->family->images->image["href"] = $bike_images[0];
        }
      
      $H = array_slice($cyclo_images, 1); $n = 1;
    
      sort($H);
      
      foreach ($H AS $h)
        {
          $xml_cyclo->bike->families->family->images->image[$n]["href"] = $H[$n-1];
    
          ++$n;
        }
    
      $xml_cyclo->asXML("./SEBikeDigitalXML_TOOLED_$F");
    }

  // grep -l "href=\"\"" SEBikeDigitalXML_TOOLED_LATIN_*.xml | sed -e "s/^/pn /g" > fixup.cmd
  print "grep -l \"href=\\\"\\\"\" SEBikeDigitalXML_TOOLED_LATIN_*.xml | sed -e \"s/^/pn /g\" > fixup.cmd\r\n";

?>
