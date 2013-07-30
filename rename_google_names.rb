require 'rubygems'
require 'nokogiri'

#Author: Sean Dokko
#This script renames google drive names

def driveNameReplace(original, name)
    folder_path = File.dirname(__FILE__) + "/bike"
    Dir.glob(folder_path + "/*").sort.each do |path|
        f = File.open(path, "r+")
        doc = Nokogiri::XML(f)
        doc.search(".//image").each do |node|
            node['href'] = node['href'].gsub(original, name)
        end
        f.close()
        o = File.new(path, "w")
        o.write(doc)
        o.close()

    end
end


driveNameReplace('marianelson', 'brookewhitney')
