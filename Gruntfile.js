
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
//	3.	Once installed “npm install im”
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

		//auto-spriting without compass
		sprite:{
			//Generates the double sized version of the retina sprite
	        retina: {
	            src: 'assets/images/auto-sprite/HD-retina-sourcefiles/*.png',
	            dest: 'assets/images/auto-sprite/HD-retina-autosprite.png',
	            destCss: 'assets/sass/00-config/sprite-sheets/HD-retina-sprites.scss',
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
	            destCss: 'assets/sass/00-config/sprite-sheets/LD-nonRetina-sprites.scss',
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
					'assets/sass/import-maps/map-modules.scss': 'assets/sass/05-modules/**/*.scss',
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
			all: {//compile all at the same time
				files: {
					//Modern style sheet
					"assets/css/style.css": "assets/sass/output-files/style.scss",

					//IE8 style sheet
					"assets/css/style-lt-ie9.css": "assets/sass/output-files/style-lt-ie9.scss",
				}
			},
			modern: {//only compile the modern style sheet
				files: {
					//Modern style sheet
					"assets/css/style.css": "assets/sass/output-files/style.scss",
				}
			},
			ie : {
				files: {
					//IE8 style sheet
					"assets/css/style-lt-ie9.css": "assets/sass/output-files/style-lt-ie9.scss",
				}
			}
		},

		//Merge similar media queries into single MQ's
		//It isn't capable of generating css maps, so this is only used in the CSS minification process
		cmq: {
			your_target: {
				files: {
					'assets/css/media-merge/': ['assets/css/style.css','assets/css/style-lt-ie9.css']
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
		      src: ['style.css','style-lt-ie9.css'],
		      dest: 'assets/css/',
		      ext: '.min.css'
		  }
		},

		//Copy files to server on save.
		//Extreamly useful at build stage
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

		ftpush: {
			dev: {
				auth: {
					host: 'can1dev011.int.rroom.net',
					port: '',
					authKey: 'dev'
				},
				dest: 'path/to/folder/',
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
					'downloads/**/*',
				]
			},
			uat: {
				auth: {
					host: 'XXXXXXXX.htmldesign.aws1.readingroom.com.au',
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
					'downloads/**/*',//optional

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
				files: ["assets/js/**/*.js"],
				tasks: [
					"concat" //merges constant js files into one file
					//"uglify", //minify JS
					//"copy:js", //copy js to server
				],
				options: { spawn: false }
			},
			scss: {
				files: ["assets/sass/**/*.scss"],
				tasks: [
					"sass_globbing",//generates import maps for SASS modules
					//"sass:all", //compile the SASS (use "all" or "ie" for IE8 fixing)
					"sass:modern", //compile the SASS (modern only by default for speed)
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