require 'rubygems'
require 'nokogiri'

puts "Normalizing the structure of the xml files"

folder_path = File.dirname(__FILE__) + "/data"
Dir.glob(folder_path + "/*").sort.each do |f|
	puts xml
end

puts "Normalizing complete."
