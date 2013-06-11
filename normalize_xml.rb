require 'rubygems'
require 'nokogiri'

puts "Normalizing the structure of the xml files"

folder_path = File.dirname(__FILE__) + "/data"
Dir.glob(folder_path + "/*").sort.each do |path|
    f = File.open(path, "r+")
    doc = Nokogiri::XML(f)
    doc.search(".//Root", ".//index").each do |node|
        node.name=("root")
        if node.element_children()[0].name() == "root"
            node.children=(node.children().children())
        end
    end

    f.close()
    o = File.new(path, "w")
    o.write(doc)
    o.close()

end

#end

puts "Normalizing complete."
