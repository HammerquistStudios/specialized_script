require 'fileutils'

#type = 'Models'
#target_path = '/Users/Freelance1/workspace/specialized/brazil/EQUIP'
def populate(type, target_path, destination_path)
    Dir.glob(target_path + '/*') do |item|
        filename = File.basename(item, File.extname(item))
        ary = filename.split('_')
        id = ary[0]
        title = ary[3]
        if title.class != NilClass && title.index(type) 
            puts title
            pos = title.index(type)
            newTitle = title[0..(pos-1)]
            case newTitle
            when 'SJFSR'
                title = newTitle + type
            when 'SJHT'
                title = newTitle + type
            else
                title = newTitle.downcase.capitalize + type
            end
        end
        newName = ""
        if (File.extname(item) == '.indd')
            newName = id + "_" + title + '_h' + File.extname(item)
            newDirName = id + " " + title
            newDirDestination = destination_path + newDirName
            dest = newDirDestination + '/' + newName
            target = target_path + '/' + filename + File.extname(item)

            #puts "new directory name: #{newDirName}"
            #puts "target path: #{target}"
            #puts "destination path: #{dest}"

            File.directory?(newDirDestination)
            if !File.directory?(newDirDestination)
                FileUtils.mkdir newDirDestination
            end
            FileUtils.cp target, dest
        end
    end
end

SPC_DIR = '/Users/Freelance1/workspace/specialized/'
def generate(region)
    Dir.glob(SPC_DIR + region + '/**') do |item|
        tmp = item.split('/').last.downcase
        if tmp == 'cyclo'
            populate('Cyclo', item, SPC_DIR + region + '/output/')
        elsif tmp == 'models' || tmp == 'bikes' || tmp == 'equip'
            populate('Models', item, SPC_DIR + region + '/output/')
        elsif tmp == 'toc'
            populate('TOC', item, SPC_DIR + region + '/output/')
        end
    end
end

#generate('poland')
#generate('czech')
generate('china')
#generate('brazil')
