require 'fileutils'

target_path = '/Users/Freelance1/workspace/specialized/poland/Bikes'
destination_path = '/Users/Freelance1/workspace/specialized/poland/output/'
puts "dest: #{destination_path}"

Dir.glob(target_path + '/*') do |item|
    filename = File.basename(item, File.extname(item))
    ary = filename.split('_')
    id = ary[0]
    title = ary[3]
    newName = ""
    if (File.extname(item) == '.indd')
        newName = id + "_" + title + '_h' + File.extname(item)
        newDirName = id + " " + title
        newDirDestination = destination_path + newDirName
        dest = newDirDestination + '/' + newName
        target = target_path + '/' + filename + File.extname(item)

        puts "new directory name: #{newDirName}"
        puts "target path: #{target}"
        puts "destination path: #{dest}"

        File.directory?(newDirDestination)
        if !File.directory?(newDirDestination)
            FileUtils.mkdir newDirDestination
        end
        FileUtils.cp target, dest
    end
    #File.rename(f, destination_path + newName + File.extname(f))
end
