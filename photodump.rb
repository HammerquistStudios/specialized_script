require 'rubygems'
require 'fileutils'

#Author: Sean Dokko
#This script drumps all of the photos to the photodump output
#file:///91E9-81_P_P SLOPE_CANDY.jpg
#file:///Users/freelance/Google Drive/Specialized Docs/_photosBIKE/Ariel/82E2-62_ARIEL_SPORT DISC_BLK WHT TEAL.jpg
def dumpPhotos()
    folder_path = File.dirname(__FILE__) + "/_photosBike"
    root = '/Users/Freelance1/workspace/specialized_script/dump_output/'
    Dir.glob(folder_path + "/**/*").sort.each do |item|
        if File.extname(item) == '.jpg'
            src = item 
            destination = root + item.split('/').last + File.extname(item)
            FileUtils.cp src, destination
            puts item
        end
    end
end
dumpPhotos()

