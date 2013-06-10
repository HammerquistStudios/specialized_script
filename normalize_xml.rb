require 'xmlsimple'

puts "Normalizing the structure of the xml files"

folder_path = File.dirname(__FILE__) + "/data"
Dir.glob(folder_path + "/*").sort.each do |f|
	config = Xmlsimple.xml_in(f)
	puts config
end

puts "Normalizing complete."
