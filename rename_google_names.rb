require 'rubygems'
require 'nokogiri'

#Author: Sean Dokko
#This script renames google drive names
#file:///91E9-81_P_P SLOPE_CANDY.jpg
#file:///Users/freelance/Google Drive/Specialized Docs/_photosBIKE/Ariel/82E2-62_ARIEL_SPORT DISC_BLK WHT TEAL.jpg
def driveNameReplace(original, name)
    folder_path = File.dirname(__FILE__) + "/Cyclo"
    Dir.glob(folder_path + "/*").sort.each do |path|
        f = File.open(path, "r+")
        doc = Nokogiri::XML(f)
        doc.search(".//image").each do |node|
            #puts node['href']
            newLink = node['href'].split('/').last
            #complete = "file:///Users/freelance/Google Drive/Specialized Docs/_photosBIKE/#{newLink}"
            complete = "file:///Users/freelance/Google Drive/Specialized Docs/dump_output/#{newLink}"
            puts complete
            #node['href'] = node['href'].gsub(original, name)
            node['href'] = complete
        end
        f.close()
        o = File.new(path, "w")
        o.write(doc)
        o.close()

    end
end


driveNameReplace('marianelson', 'brookewhitney')
