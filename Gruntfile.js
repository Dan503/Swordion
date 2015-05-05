
var js_merge_files = [
	'assets/js/plugins/constant/**/*.js',
	'assets/js/doc.ready-open.js',
	'assets/js/00-global-variables/**/*.js',
	'assets/js/01-global-functions/**/*.js',
	'assets/js/js-loader.js',
	'assets/js/_main.js',
	'assets/js/modules/constant/**/*.js',
	'assets/js/doc.ready-close.js',
];

//var autoprefixer = require('autoprefixer-core');

//needed for the copy function
//var server_root = '//CAN1DEV002/wwwroot/___SITE_FOLDER_NAME___/';

module.exports = function (grunt) {

	//Avoids the need for the grunt.loadNpmTasks('xxx') commands
	//https://www.npmjs.org/package/jit-grunt
	require("jit-grunt")(grunt, {
		//for any grunt plugins that aren't working without grunt.loadNpmTasks("grunt_plugin_name");, list them here:
		// task_name: "grunt_plugin_name",
		cmq: "grunt-combine-media-queries",
		watch: "grunt-contrib-watch",
		sprite: "grunt-spritesmith",
	});

	grunt.initConfig({
		pkg: grunt.file.readJSON("package.json"),


		//Merges all constant JS files into a single file
		concat: {
			options: {
				banner: '/* This is a generated file. Do not edit */'
			},
			dist: {
				src: js_merge_files,
				dest: 'assets/js/merged.js',
			},
		},

		//Minimises the JS
		//I need to find a way to uglify without removing the MIT licences
		uglify: {
			my_target: {
				options: {
					sourceMap: false,
					preserveComments: 'some'
				},
				files: {
					"assets/js/merged.min.js": ["assets/js/merged.js"],
					"assets/js/js-loader.min.js": ["assets/js/js-loader.js"]
				}
			}
		},

		//This shrinks the HD sprite to normal size
// In order for it to work, you need to install imageMagic on your computer:
//	1.	Go here to download it http://www.imagemagick.org/script/binary-releases.php
//	2.	Follow the instructions while cd is the default, NOT the project directory (make sure to tick "add to system path" when the option comes up)
//	3.	Once installed… (I can’t remember if it’s in or out of the project folder cd) “npm install im”
//	4.	When cd is the project folder “npm install grunt-image-resize”
//	5.	You’re done, it should be working now :)
		image_resize: {
			resize: {
				options: {
					width: '50%',
					height: '50%',
				},
				files: {
					//destination
					'assets/images/auto-sprite/LD-retina-autosprite.png':
					//source
					'assets/images/auto-sprite/HD-retina-autosprite.png'
				}
			}
		},

		//Able to auto-sprite without compass! :D
		sprite:{
			//Generates the double sized version of the retina sprite
	        retina: {
	            src: 'assets/images/auto-sprite/HD-retina-sourcefiles/*.png',
	            dest: 'assets/images/auto-sprite/HD-retina-autosprite.png',
	            destCss: 'assets/sass/01-config/sprite-sheets/HD-retina-sprites.scss',
	            cssFormat: 'scss_maps',
	            imgPath: '../images/auto-sprite/HD-retina-autosprite.png',
	            padding: 4,
				cssSpritesheetName: 'spritesheet-retina',
	            cssOpts: {
	                functions: false,
	            },
	        },
			//Generates a normal sized sprite that is used on both retina and non retina screens
			//If you do not have a double sized version for an image, use this.
			nonRetina: {
	            src: 'assets/images/auto-sprite/LD-nonRetina-sourceFiles/*.png',
	            dest: 'assets/images/auto-sprite/LD-nonRetina-autosprite.png',
	            destCss: 'assets/sass/01-config/sprite-sheets/LD-nonRetina-sprites.scss',
	            cssFormat: 'scss_maps',
	            imgPath: '../images/auto-sprite/LD-nonRetina-autosprite.png',
	            padding: 2,
				cssSpritesheetName: 'spritesheet-nonRetina',
	            cssOpts: {
	                functions: false,
	            },
			}
	    },

		//allows sass to import a whole directory at a time
		sass_globbing: {
			all: {
				files: {
					'assets/sass/import-maps/map-config.scss': 'assets/sass/00-config/**/*.scss',
					'assets/sass/import-maps/map-functions.scss': 'assets/sass/01-functions/**/*.scss',
					'assets/sass/import-maps/map-mixins.scss': 'assets/sass/02-mixins/**/*.scss',
					'assets/sass/import-maps/map-plugins.scss': 'assets/sass/03-plugins/**/*.scss',
					'assets/sass/import-maps/map-base.scss': 'assets/sass/04-base/**/*.scss',
					'assets/sass/import-maps/map-globalModules.scss': 'assets/sass/05-global-modules/**/*.scss',
					'assets/sass/import-maps/map-contentModules.scss': 'assets/sass/06-content-modules/**/*.scss',
					//'assets/sass/import-maps/map-animations.scss': 'assets/sass/07-animations/**/*.scss', //only required if the site has advanced multistage animations
				}
			}
		},


		//compiles the SASS
		sass: {
			options: {
				style: "compact",

				//'sass-globbing' allows sass to bulk import files
				//you need to install the 'sass-globbing' gem before use (gem install sass-globbing)
				//require: 'sass-globbing',// Doesn't work on Windows :'(

				//sourcemap: true, //deprecated in latest SASS version
				compass: false // I don't like compass >:(
				//compass: true
			},
			all: {//compile all at the same time
				files: {
					//Modern style sheet
					"assets/css/style.css": "assets/sass/output-files/style.scss",
					//IE9 style sheet
					"assets/css/style-ie9.css": "assets/sass/output-files/style-ie9.scss",
					//IE8 style sheet
					"assets/css/style-ie8.css": "assets/sass/output-files/style-ie8.scss",
				}
			},
			modern: {//only compile the modern style sheet
				files: {
					//Modern style sheet
					"assets/css/style.css": "assets/sass/output-files/style.scss",
				}
			},
			ie9 : {
				files: {
					//IE9 style sheet
					"assets/css/style-ie9.css": "assets/sass/output-files/style-ie9.scss",
				}
			},
			ie8 : {
				files: {
					//IE8 style sheet
					"assets/css/style-ie8.css": "assets/sass/output-files/style-ie8.scss",
				}
			}
		},

		// Automatically add prefixing to css
		// I handle all my prefixing in the mixins
		/*autoprefixer: {
			options: {
				browsers: ["last 1 version", "Android 2", "Android 4", "BlackBerry 7", "BlackBerry 10", "iOS 6", "iOS 7", "OperaMobile 20", "OperaMini 7", "OperaMini 8", "ChromeAndroid 36", "ExplorerMobile 9", "ExplorerMobile 10"]
			},
			sm: {
				options: {
					map: true
				},
				src: "css/style.css"
			}
		},*/

		//Merge similar media queries into single MQ's
		//It isn't capable of generating css maps, so this is only used in the CSS minification process
		cmq: {
			your_target: {
				files: {
					'assets/css/media-merge/': ['assets/css/style.css','assets/css/style-ie9.css','assets/css/style-ie8.css']
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
		      cwd: 'assets/css/media-merge/',
		      src: ['style.css','style-ie9.css','style-ie8.css'],
		      dest: 'assets/css/',
		      ext: '.min.css'
		  }
		},

		//Copy files to server on save. Extreamly useful at build stage!
		//See DIAC TIS Transact build for example of this working
		/*copy: {
			js: {
				files: [
					// includes files within path
					{
						expand: true,
						src: ['assets/js/*.js', 'assets/js/ie8/*.js'],
						dest: server_root
					}
				]
			},
			images: {
				files: [
					// includes files within path
					{
						expand: true,
						src: ['assets/images/**'],
						dest: server_root

					}
				]
			},
			css: {
				files: [
					// includes files within path
					{
						expand: true,
						src: ['assets/css/*.css', 'assets/css/*.map'],
						dest: server_root
					}
				]
			},
			views: {
				files: [
					// includes files within path
					{
						expand: true,
						src: ['Views/InterpreterApplication/Index.cshtml'],
						//src: ['Views/**//*.cshtml'], //remove one of the middle slashes
						dest: server_root
					}
				]
			}
		},*/

		'ftp-deploy': {
			options: {
				src: '/',
				exclusions: [
					'**/.DS_Store',
					'**/Thumbs.db',
					'**/tmp',
					'.sass-cache/**/*',
					'node_modules/**/*',
					'00 - Grunt start up.txt',
					'00 - Grunt ftp-deploy.txt',
					'Gruntfile.js',
					'package.json',
					'.ftppass',
					'downloads/**/*'//optional
				]
			},
			dev: {
				auth: {
					host: 'can1dev011.int.rroom.net',
					port: '',
					authKey: 'dev'
				},
				dest: 'data/webs/oeh/calculator/prototype',
			},
			uat: {
				auth: {
					host: 'aws1.readingroom.com.au',
					port: '',
					authKey: 'uat'
				},
				dest: 'path/to/folder/',
			}
		},

		watch: {
			options: {
				livereload: true
			},
			scripts: {
				files: ["assets/js/**/*.js"],
				tasks: [
					"concat" //merges constant js files into one file
					//"uglify", //minify JS
					//"copy:js", //copy js to server
				],
				options: { spawn: false }
			},
			scss: {
				files: ["**/*.scss"],
				tasks: [
					"sass_globbing",//generates import maps for SASS modules
					"sass:modern", //compile the SASS (modern only by default for speed)
					//"autoprefixer", //add prefixing (I do it with mixins and can't get this to work without ruining the .map files)
					//"cmq", //merge media queries
					//"csso", //minify css
					//"copy:css", //copy css to server
				],
				options: { spawn: false }
			},
			sprite_retina: {
				files: ["assets/images/auto-sprite/HD-retina-sourceFiles/*.png"],
				tasks: [
					"sprite:retina",
					"image_resize",
				],
				options: { spawn: false }
			},
			sprite_nonRetina: {
				files: ["assets/images/auto-sprite/LD-nonRetina-sourceFiles/*.png"],
				tasks: [
					"sprite:nonRetina",
				],
				options: { spawn: false }
			},
			html: {
				options: {
					livereload: true
				},
				//The other file types that will trigger a browser refresh on save
				files: [
					"**/*.html",
					"**/*.htm",
					"**/*.php",
					"**/*.cshtml",
				]
			}
		}

	});

	//don't bother with the grunt.loadNpmTasks('xxx'); commands. They are generated automatically

	//list the tasks in the order you want them done in
	grunt.registerTask("default", [
		"concat",
		"uglify",//minify JS
		"sprite",
		"image_resize",
		"sass_globbing",
		"sass:all",
		"cmq",//combine media queries
		"csso",//minify css (css optimiser)
			//"copy",
		"watch"
	]);

};