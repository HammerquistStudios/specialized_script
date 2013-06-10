puts "Renaming files..."

folder_path = File.dirname(__FILE__) + "/templates"
Dir.glob(folder_path + "/*").sort.each do |f|
    filename = File.basename(f, File.extname(f))
    ary = filename.split('_')
    newName = ary.last()
    File.rename(f, folder_path + "/" + newName + File.extname(f))
end

puts "Renaming complete."
