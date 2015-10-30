
var jsMerge = {
	splits : [
		//base splits
		'isConstant',
		'isLegacy',
		'isModern',

		//extra splits
		'isHome',
	],
	components : [
		{
			folder: 'vendor-JS/auto-load-JS',
			isSplit: true,
		}, {
			folder: '00-variables-global-JS',
			isSplit: true
		}, {
			folder: '01-functions-global-JS',
			isSplit: true,
		}, {
			folder: 'plugins-JS',
			isSplit: true,
		}, {
			file: 'doc.ready-open.js',
			usedIn : 'all',// other option is an array eg. ['isHome', 'isModern']
		}, {
			folder : 'modules-JS',
			isSplit : true,
		}, {
			file: 'doc.ready-close.js',
			usedIn : 'all',
		}
	]
};

//configure grunt concat options here
var JS_mergeConfig = {
	options: {
		banner: '/* This is a generated file. Do not edit */'
	}
};

var JS_merge_files = {};

//generates an array of files delegated to each split
for (var x = 0; x < jsMerge.splits.length; x++){

	var root = '2015/assets/js/';
	var split = jsMerge.splits[x];

	JS_merge_files[split] = [];

	for (var i = 0; i < jsMerge.components.length; i++){

		var component = jsMerge.components[i];

		//if it's a file
		if (typeof component.file !== 'undefined'){
			if (component.usedIn == 'all' || component.usedIn.indexOf(split) > -1){
				JS_merge_files[split].push(root + component.file);
			}

		//else it's a folder
		} else {
			//if componenet is not split, only load it in the 'isConstant' set
			if (component.isSplit || split == 'isConstant'){

				var currentSplit = component.isSplit ? '/' + split : '';

				JS_merge_files[split].push(root + component.folder + currentSplit + '/**/*.js');
			}
		}
	};

	//formats the data into a form that grunt concat understands
	JS_mergeConfig[split] = {
		src : JS_merge_files[split],
		dest : root + 'ZZ-merged-JS/' + split + '.js'
	}

}

//use this to test the grunt concat code
//console.log(JS_mergeConfig);
//console.log(JS_merge_files);

//generates the grunt uglify syntax
var JS_minified_files = {};
for (var key in JS_merge_files) {
  if (JS_merge_files.hasOwnProperty(key)) {

  	JS_minified_files['2015/assets/js/ZZ-merged-JS/'+key+'.min.js'] = ['2015/assets/js/ZZ-merged-JS/'+key+'.js'];
  }
}
//test grunt uglify syntax
//console.log(JS_minified_files);

//var autoprefixer = require('autoprefixer-core');

//needed for the sync function
var server_root;

//Use this to discover what platform your computer uses
//console.log(process.platform);
switch (process.platform) {
// Windows
	case 'win32':
		server_root =  '//CAN1DEV012/webs/doc-ar-2015/';
		break;

// Mac OSX
	case 'darwin' :
		server_root =  '/Volumes/webs/doc-ar-2015/';
		break;
}

module.exports = function (grunt) {

	//Avoids the need for the grunt.loadNpmTasks('xxx') commands
	//https://www.npmjs.org/package/jit-grunt
	require("jit-grunt")(grunt, {
		//for any grunt plugins that aren't working without grunt.loadNpmTasks("grunt_plugin_name");, list them here:
		// task_name: "grunt_plugin_name",
		cmq: "grunt-combine-media-queries",
		watch: "grunt-contrib-watch",
	});

	grunt.initConfig({
		pkg: grunt.file.readJSON("package.json"),


		//Merges JS files together
		concat: JS_mergeConfig,

		//Minimises the JS
		uglify: {
			my_target: {
				options: {
					sourceMap: false,
					preserveComments: 'some'
				},
				files: JS_minified_files
			}
		},

		//allows sass to import a whole directory at a time
		sass_globbing: {
			all: {
				files: {
					'2015/assets/sass/import-maps/map-functions.scss': '2015/assets/sass/00-functions-SASS/**/*.scss',
					'2015/assets/sass/import-maps/map-config.scss': '2015/assets/sass/01-config-SASS/**/*.scss',
					'2015/assets/sass/import-maps/map-mixins.scss': '2015/assets/sass/02-mixins-SASS/**/*.scss',
					'2015/assets/sass/import-maps/map-plugins.scss': '2015/assets/sass/03-plugins-SASS/**/*.scss',
					'2015/assets/sass/import-maps/map-base.scss': '2015/assets/sass/04-base-SASS/**/*.scss',
					'2015/assets/sass/import-maps/map-modules.scss': '2015/assets/sass/05-modules-SASS/**/*.scss',
					'2015/assets/sass/import-maps/map-home.scss': '2015/assets/sass/06-home-SASS/**/*.scss',
				}
			}
		},


		//compiles the SASS
		sass: {
			options: {
				style: "compact",
				//sourcemap: true, //deprecated in latest SASS version
				compass: false
			},
			modern: {//only compile the modern style sheet
				files: {
					//Modern style sheet
					"2015/assets/css/modern.css": "2015/assets/sass/output-files/modern.scss",
					//Modern HOME style sheet
					"2015/assets/css/home-modern.css": "2015/assets/sass/output-files/home-modern.scss",
				}
			},
			ie9 : {
				files : {
					//IE9 style sheet
					"2015/assets/css/ie9.css": "2015/assets/sass/output-files/ie9.scss",
					//IE9 HOME style sheet
					"2015/assets/css/home-ie9.css": "2015/assets/sass/output-files/home-ie9.scss",
				}
			},
			ie8 : {
				files : {
					//IE8 style sheet
					"2015/assets/css/ie8.css": "2015/assets/sass/output-files/ie8.scss",
					//IE8 HOME style sheet
					"2015/assets/css/home-ie8.css": "2015/assets/sass/output-files/home-ie8.scss",
				}
			}
		},

		//Merge similar media queries into single MQ's
		//It isn't capable of generating css maps, so this is only used in the CSS minification process
		cmq: {
			your_target: {
				files: {
					'2015/assets/css/media-merge/': [
						'2015/assets/css/modern.css',
						'2015/assets/css/ie9.css',
						'2015/assets/css/ie8.css',
						'2015/assets/css/home-modern.css',
						'2015/assets/css/home-ie9.css',
						'2015/assets/css/home-ie8.css'
					]
				}
			}
		},

		//css optimiser (minification)
		//http://bem.info/tools/optimizers/csso/description/
		csso: {
		  minify: {
		    options: {
		      banner: '/* Simmilar mediaqueries have been merged and CSS has been Minified in this file (Not to be loaded into the browser during site development) */'
		    },
			//takes the current css files in the "media-merge" folder, minifies them, adds '.min.css' to the end of the file, and copies them back into the main css folder
		      expand: true,
		      cwd: '2015/assets/css/media-merge/',
		      src: ['modern.css','ie9.css','ie8.css','home-modern.css','home-ie9.css','home-ie8.css'],
		      dest: '2015/assets/css/',
		      ext: '.min.css'
		  }
		},

		// Keep files on server in sync with local copy
		// Extreamly useful at build stage
		sync: {
			js: {
				files: [
					// includes files within path
					{
						cwd: '2015/assets/js/',
						src: ['ZZ-merged-JS/*.js'],
						dest: server_root + '2015/assets/js/',
					}
				],
				//pretend: true, // Don't do any IO. Before you run the task with `updateAndDelete` PLEASE MAKE SURE it doesn't remove too much.
				verbose: true // Display log messages when copying files
			},
			images: {
				files: [
					{
						src: '2015/assets/images/**',
						dest: server_root
					}
				],
				//pretend: true,
				verbose: true
			},
			css: {
				files: [
					{
						cwd: '2015/assets/css/',
						src: ['*.css', '*.map'],
						dest: server_root + '2015/assets/css/'
					}
				],
				//pretend: true,
				verbose: true
			},
			html: {
				files: [
					{
						src: '**/*.php',
						dest: server_root
					}
				],
				//pretend: true,
				verbose: true
			},
			fonts: {
				files: [
					{
						cwd: '2015/assets/fonts/',
						src: ['**/**'],
						dest: server_root + '2015/assets/fonts/'
					}
				],
				//pretend: true,
				verbose: true
			}
		},

		ftpush: {
			uat: {
				auth: {
					host: 'doc-ar-2015.uat.aws1.readingroom.com.au',
					port: '',
					authKey: 'uat'
				},
				dest: 'web/',
				src: '',
				exclusions: [
					'.git/**/*',
					'**/.DS_Store',
					'**/Thumbs.db',
					'**/tmp',
					'.sass-cache/**/*',
					'node_modules/**/*',
					'grunt-start-up.txt',
					'grunt-first-time.txt',
					'Gruntfile.js',
					'package.json',
					'.ftppass',
					//'downloads/**/*',//optional

					//UAT only
				],
				keep: [
					'.htaccess',
					'.htpasswd',
					'error/**/*',
					'stats/**/*',
				]
			}
		},

		watch: {
			options: {
				livereload: true
			},
			scripts: {
				files: ["2015/assets/js/**/*.js", "!2015/assets/js/ZZ-merged-JS/*.js"],
				tasks: [
					"concat", //merges constant js files into one file
					//"uglify", //minify JS
					"sync:js" //copy js to server
				],
				options: { spawn: false }
			},
			scss: {
				files: ["2015/assets/sass/**/*.scss"],
				tasks: [
					"sass_globbing",//generates import maps for SASS modules
					"sass:modern", //compile the modern SASS (modern only by default for speed)
					"sass:ie8", //compile the IE8 SASS
					"sass:ie9", //compile the IE9 SASS
					"cmq", //merge media queries
					"csso", //minify css
					"sync:css" //copy css to server
				],
				options: { spawn: false }
			},
			html: {
				options: {
					livereload: true
				},
				//The other file types that will trigger a browser refresh on save
				tasks: [
					"sync:html",
				],
				files: [
					"**/*.html",
					"**/*.htm",
					"**/*.php",
					"**/*.cshtml"
				]
			},
			fonts: {
				options: {
					livereload: true
				},
				//The other file types that will trigger a browser refresh on save
				tasks: [
					"sync:fonts",
				],
				files: [
					"2015/assets/fonts/**/**"
				]
			}
		}

	});

	//don't bother with the grunt.loadNpmTasks('xxx'); commands. They are generated automatically

	//list the tasks in the order you want them done in
	grunt.registerTask("default", [
		"concat",
			"uglify",//minify JS //use this instead http://fmarcia.info/jsmin/test.html
		"sass_globbing",
		"sass",//compile all SASS files when running the grunt command
		"cmq",//combine media queries
		"csso",//minify css (css optimiser)
		"sync",
		"watch"
	]);

};