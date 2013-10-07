specialized_script
==================

inDesign script that plugs xml data for various inDesign template files

Getting started with setting up a ruby environment:

- Install homebrew
- Install rvm
- Install dependent rubygems

Try not to use sudo when using ruby.

If you want to deploy multiple articles:

- Edit restructure_for_folio.rb
  - Make sure the path's are configured to your machine
- Grab the _readyForTesting in the country/region you are trying to upload to in the Google Drive Specialized Docs folder.
- Create a directory called specialized in your workspace.
- In your specialized directory, paste the _readyForTesting and name it to the specified country. We'll use france as an example.
- france should have Bikes, Equip, Cyclo, and TOC. The naming should match this exactly. Some directories may not exist for some regions.
- in france, create a directory called output.
- Run the ruby file. 'ruby restructure_for_folio.rb'. That should create the files for mass adding articles.

Creating a sidecar.xml (optional)
sidecar.xml is a way to organize the articles and order them in the cloud without you having to do it yourself.
- Configure the paths in generateSidecar.rb
- Run the ruby file. 'ruby generateSidecar.rb'
- 

Open Indesign
- Window -> Folio Builder
- login to appropriate region
- Name <Region> 2014 Dealer Book
- Set options Landscape only & offline
- Select Import Article
- Select import multiple
- When complete - Upload to publisher

