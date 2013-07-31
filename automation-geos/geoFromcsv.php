<?php

  $PRODUCT ="ZZZZZZZ";
  
  global $a;
  
  $a = Array();
  
  require("u.inc");

// ################

  $EOL = "\r\n";

  $xml = "<geos><geo_heading><geo_name>$PRODUCT</geo_name>$EOL";

  foreach ($a AS $b)
    {
      $F = Array();

      if ("\"" != $b[0])
        {
          $F = @explode(",",$b);
        }
      else
        {
          if (($close_quote = strpos($b,"\"",3)) != FALSE)
            {
              $c = substr($b, 1, $close_quote-1);
              $d = explode(",",substr($b, $close_quote+2));

              $F[] = $c;

              for ($i = 1; $i <= count($d); $i++)
                {
                  $F[$i] = $d[$i-1];
                }
            }
        }

    $column_count = count($F);

    $hash = substr(md5($F[0]),0,14);

    for ($i = 1; $i < $column_count; $i++)
      {
        if (0 == doubleval($F[$i]))
          continue;

        $iv = intval($F[$i]);
        $dv = doubleval($F[$i]);
        if ($iv != $dv)
          {
            $n = $dv-$iv;

            if (!((0.25 == $n) || (0.5 == $n) || (0.75 == $n)))
              {
                $F[$i] = intval(ceil($dv));
              }

          }
        else
          {
            $F[$i] = number_format(intval($F[$i]),0,"","");
          }
      }

    $values = ""; $postfix = "";

    for ($i = 1; $i < $column_count; $i++)
      {
        $values .= $F[$i]."\t";
      }

    $values = trim($values); $EOL_AFTER_TAG = true;

    switch($hash)
      {
        case "bbdb6cc6c2ec94": $tag = "bottom_bracket_drop"; break;
        case "19283496393f91": $tag = "bottom_bracket_drop"; break;
        case "7c987e7cb2e654": $tag = "bottom_bracket_height"; break;
        case "69a15623f35e11": $tag = "bottom_bracketheight_low_setting"; break;
        case "1f9f38f97fa56e": $tag = "bottom_bracketheight_mid_setting"; break;
        case "73141a7c951089": $tag = "bottom_bracketheight_high_setting"; break;
        case "b79c6b15e092b1": $tag = "chainstay_length"; break;
        case "36997b5f85f3da": $tag = "chainstay_length"; break;
        case "6f6cb72d544962": $tag = "geo_size"; $postfix = "</geo_heading>$EOL<geo>"; $EOL_AFTER_TAG = false; break;
        case "ebecb8ff0a0fa0": $tag = "head_tube_angle"; break;
        case "37a734e24603fb": $tag = "head_tube_angle_high_setting"; break;
        case "868b9f356b5543": $tag = "head_tube_angle_low_setting"; break;
        case "ffbbf3a3ed3064": $tag = "head_tube_height"; break;
        case "9e88f7a75da60b": $tag = "head_tube_length"; break;
        case "bdd59b3d4a1179": $tag = "seat_tube_angle_actual"; break;
        case "2b87cf5a9ce438": $tag = "seat_tube_angle_effective"; break;
        case "6cb6a1e264a2fe": $tag = "seat_tube_angle"; break;
        case "5748070da51992": $tag = "seat_tube_angle"; break;
        case "b1436ed3f44a2c": $tag = "seat_tube_angle_actual_high_setting"; break;
        case "260a4a0b3fc7ae": $tag = "seat_tube_angle_actual_low_setting"; break;
        case "954b18a94ba676": $tag = "seat_tube_angle_actual"; break;
        case "37cc08bba0954a": $tag = "seat_tube_angle_effective_high_setting"; break;
        case "8092968df49e68": $tag = "seat_tube_angle_effective_low_setting"; break;
        case "346fc23c3e9639": $tag = "seat_tube_angle_effective"; break;
        case "366701805ace48": $tag = "seat_tube_angle_actual_alloy"; break;
        case "0b236ddf525554": $tag = "seat_tube_angle_actual_carbon"; break;
        case "0d92f599c5fc0c": $tag = "seat_tube_angle_effective"; break;
        case "55efb58435f25c": $tag = "seat_tube_length"; break;
        case "f6d5a1ade38ded": $tag = "seat_tube_length"; break;
        case "5ac7cd2b2160ad": $tag = "seat_tube_length"; break;
        case "98909c36777cd9": $tag = "seat_tube_length_center_to_top"; break;
        case "8dd1b36056e7bb": $tag = "seat_tube_length_center_to_top"; break;
        case "cff0699ca263ea": $tag = "stack"; break;
        case "f4ff281b73b171": $tag = "standover_height"; break;
        case "4a0ada6edd012d": $tag = "top_tube_length_horiz"; break;
        case "7d5916c25600db": $tag = "top_tube_length_horiz"; break;
        case "676bbb54b68199": $tag = "top_tube_length_actual"; break;
        case "0464b75e52412b": $tag = "top_tube_length_actual"; break;
        case "7ae82b1ae23e79": $tag = "top_tube_length"; break;
        case "39b9170fe0939b": $tag = "wheel_base"; break;
        case "34db6498da9b0d": $tag = "reach"; break;
        case "2d1a967a9b1b38": $tag = "handlebar_width"; break;
        case "021938ee52bb1d": $tag = "stem_length"; break;
        case "0d041c2bad26c6": $tag = "crank_length"; break;
        case "0bc043c35f8d62": $tag = "seatpost_length"; break;
        case "02329870e5ebeb": $tag = "front_center"; break;
        case "aacee99ecfbe66": $tag = "ground_top"; break;
        case "954ad8b2ef2623": $tag = "top_tube_length_horiz"; break;
        case "74824dc3e17353": $tag = "chainstay_length"; break;
        case "977d8fc1ea1bac": $tag = "seat_tube_angle"; break;
        case "68868fffa30472": $tag = "head_tube_angle"; break;
        case "258924ee4c6241": $tag = "fork_rake"; break;
        case "2fb629997f0462": $tag = "trail"; break;
        case "356ae186726399": $tag = "front_center"; break;
        case "a5cd02d6015616": $tag = "wheel_base"; break;
        case "43333497345929": $tag = "standover_height"; break;
        case "2dcd4d52448b6e": $tag = "head_tube_length"; break;
        case "c290e7639a4c0c": $tag = "handlebar_width"; break;
        case "771e5d8950bd60": $tag = "seatpost_length"; break;
        case "487f1e2828faa3": $tag = "reach"; break;
        case "df820d9b06d7b8": $tag = "stack"; break;
        case "891451be4581e5": $tag = "stem_length"; break;
        case "e716a0ae333c2c": $tag = "seat_tube_length"; break;
        case "617db32e05f436": $tag = "top_tube_length"; break;
        case "54c14a15acf271": $tag = "seat_post_setback"; break;
        case "487f1e2828faa3": $tag = "reach"; break;
        case "fc6dc72085282d": $tag = "fork_length"; break;
        case "825df64d76d328": $tag = "fork_offset"; break;
        case "6a3ce39176ed82": $tag = "rake"; break;
/*
case "": $tag = ""; break;
case "": $tag = ""; break;
case "": $tag = ""; break;
case "": $tag = ""; break;
case "": $tag = ""; break;
case "": $tag = ""; break;
case "": $tag = ""; break;
*/

          break;

        default: $tag = "###[$hash]##"; break;
      }

      $xml .= "<$tag>".$F[0]."\t$values</$tag>$postfix";
      
      if ($EOL_AFTER_TAG) $xml .= $EOL;
    }

  $xml = trim($xml);

  $xml .= "</geo></geos>$EOL";

  file_put_contents("./z.xml", $xml);

?>