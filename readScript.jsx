var aFile = File.openDialog ( 'Select a Tab delimited file to parse:', '*.txt', false ) ;
var fileData = readTabDelimitedFile ( aFile ) ;
for ( var dIndex = 0 ; dIndex < fileData.length ; dIndex++ ) { //-- Do what you want with the data on a line by line basis. //-- This will write it to the JavaScript Concole with //-- and ugly '' indicator to show you where the
//-- tabs were in the original file.
$.writeln( fileData[dIndex].join ('' ) ) ;
}
//
function readTabDelimitedFile ( fPath ) {
	var returnArray = new Array ();
	var fileObject = File ( fPath );
		if ( ! fileObject.exists ) {
			return returnArray;
		}

	//-- Create a regular expression for a tab.
	var tabExpression = new RegExp ( '\\t' ) ;

	//-- Read the file.
	try {
		fileObject.open ('r') ; //-- Open for reading.
		while ( ! fileObject.eof ) {
			var currentLine = fileObject.readln () ;
				if ( tabExpression.test( currentLine ) ) {
					returnArray.push(currentLine.split ('\t')) ;
				}
		}
		fileObject.close();
	} catch (errMain) {
		try {
		fileObject.close();
		}
		catch (errInner ) {}
	}
	return returnArray ;
}