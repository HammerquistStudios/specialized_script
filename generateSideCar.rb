require 'nokogiri'

SPC_DIR = '/Users/Freelance1/workspace/specialized/china/output'


builder = Nokogiri::XML::Builder.new(:encoding => 'UTF-8') do |xml|
    xml.sidecar {
        Dir.glob(SPC_DIR + '/**') do |item|
            xml.entry {
                xml.folerName item
                xml.smoothScrolling "never"
                xml.isAd  "false"
                xml.isFlattenedStack "false"
                xml.isTrustedContent "true"
            }
        end
    }
end

o = File.new(SPC_DIR + '/sidecar.xml', 'w')
o.write(builder.to_xml)
o.close()
