
//########################################\\
//# Grunt to Gulp conversion check list: #\\
//########################################\\

//- done - sass-globbing (need to create the @import paths)
//- done - compile sass
//- done - auto-prefix sass (post-css)
//- done - minify sass (css-nano)
//- done - js-merge
//- done - js-minify
//- done - add browser-sync with npm php server:
//- done - icomoon unpackager
//- done - copy assets to build folder
//- done - auto-sprite (removed from gulp version)
//- done - watch
//- done - modernizr
- x - get browser-sync to fully reload the page on icon unpackaging
- x - fix icommon unpackage bug that kills browsersync sometimes
- x - copy to server
- x - ftp upload



//Code for checking if OS is windows or mac.
//Needed for network upload functionality when it eventually gets added

//needed for the sync function
var server_root;

//Use this to discover what platform your computer uses
//console.log(process.platform);
switch (process.platform) {
// Windows
	case 'win32':
		server_root =  '//CAN1DEV012/webs/folderName/';
		break;

// Mac OSX
	case 'darwin' :
		server_root =  '/Volumes/webs/folderName/';
		break;
}

console.log(server_root);
