
var js_merge_files = [
	'assets/js/plugins/constant/*.js',
	'assets/js/config-files/doc.ready-open.js',
	'assets/js/config-files/config.js',
	'assets/js/js-loader.js',
	'assets/js/_main.js',
	'assets/js/segments/constant/*.js',
	'assets/js/config-files/doc.ready-close.js',
];

var autoprefixer = require('autoprefixer-core');

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
					sourceMap: false
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
//	2.	Follow the instructions while cd is the default, NOT the project directory
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
					'assets/images/auto-sprite/LD-primary-autosprite.png':
					//source
					'assets/images/auto-sprite/HD-primary-autosprite.png'
				}
			}
		},

		//Able to auto-sprite without compass! :D
		sprite:{
			//Generates the double sized version of the primary sprite
	        primary: {
	            src: 'assets/images/auto-sprite/HD-primary-sourcefiles/*.png',
	            dest: 'assets/images/auto-sprite/HD-primary-autosprite.png',
	            destCss: 'assets/sass/00-config-files/sprite-sheets/HD-primary-sprites.scss',
	            cssFormat: 'scss_maps',
	            imgPath: '../images/auto-sprite/HD-primary-autosprite.png',
	            padding: 4,
				cssSpritesheetName: 'spritesheet-primary',
	            cssOpts: {
	                functions: false,
	            },
	        },
			//Generates a normal sized sprite that is used on both retina and non retina screens
			//If you do not have a double sized version for an image, use this.
			secondary: {
	            src: 'assets/images/auto-sprite/LD-secondary-sourceFiles/*.png',
	            dest: 'assets/images/auto-sprite/LD-secondary-autosprite.png',
	            destCss: 'assets/sass/00-config-files/sprite-sheets/LD-secondary-sprites.scss',
	            cssFormat: 'scss_maps',
	            imgPath: '../images/auto-sprite/LD-secondary-autosprite.png',
	            padding: 2,
				cssSpritesheetName: 'spritesheet-secondary',
	            cssOpts: {
	                functions: false,
	            },
			}
	    },

		//allows sass to import a whole directory at a time
		sass_globbing: {
			all: {
				files: {
					'assets/sass/import-maps/config-map.scss': 'assets/sass/00-config-files/**/*.scss',
					'assets/sass/import-maps/base-map.scss': 'assets/sass/02-base/**/*.scss',
					'assets/sass/import-maps/global-modules-map.scss': 'assets/sass/03-global-modules/**/*.scss',
					'assets/sass/import-maps/content-modules-map.scss': 'assets/sass/04-content-modules/**/*.scss',
					'assets/sass/import-maps/animation-map.scss': 'assets/sass/05-staged-animations/**/*.scss',
				}
			}
		},


		//compiles the SASS
		sass: {
			dist: {
				options: {
					style: "expanded",

					//'sass-globbing' allows sass to bulk import files
					//you need to install the 'sass-globbing' gem before use (gem install sass-globbing)
					//require: 'sass-globbing',// Doesn't work on Windows :'(

					//sourcemap: true, //deprecated in latest SASS version
					compass: false // I don't like compass >:(
					//compass: true
				},
				files: {
					//Modern style sheet
					"assets/css/style.css": "assets/sass/output-files/style.scss",
					//IE8 style sheet
					"assets/css/style-lt-ie9.css": "assets/sass/output-files/style-lt-ie9.scss",
				}
			}
		},

		//auto-prefixing that doesn't break your map file :D
		autoprefixer: {
	        options: {
				map: true,//tracks changes done to css and edits the css map accordingly
	        },
			main: {
	        	expand: true,
				flatten: false,
	        	src: 'assets/css/style.css',
				dest: 'style.css',
				options : {
					browsers: ['last 3 versions', 'ie 9', 'ie10'],
				},
			},
	        ie: {
	        	expand: true,
				flatten: false,
	        	src: 'assets/css/style-lt-ie9.css',
				dest: 'style-lt-ie9.css',
				options : {
					browsers: ['ie7', 'ie 8'],
				}
			},
	    },

		//Merge similar media queries into single MQ's
		//It isn't capable of generating css maps, so this is only used in the CSS minification process
		cmq: {
			your_target: {
				files: {
					'assets/css/media-merge/': ['assets/css/*.css']
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
			src: ['*.css', '!*.min.css'],
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

		watch: {
			options: {
				livereload: true
			},
			scripts: {
				files: ["assets/js/**/*.js"],
				tasks: [
					"concat" //merges constant js files into one file
					//"uglify", //minimise JS
					//"copy:js", //copy js to server
				],
				options: { spawn: false }
			},
			scss: {
				files: ["**/*.scss"],
				tasks: [
					"sass_globbing",//generates import maps for SASS modules
					"sass:dist", //compile the SASS
					"autoprefixer",//auto-prefix css
					//"cmq", //merge media queries
					//"csso", //minify css
					//"copy:css", //copy css to server
				],
				options: { spawn: false }
			},
			sprite_primary: {
				files: ["assets/images/auto-sprite/HD-primary-sourceFiles/*.png"],
				tasks: [
					"sprite:primary",
					"image_resize",
				],
				options: { spawn: false }
			},
			sprite_secondary: {
				files: ["assets/images/auto-sprite/LD-secondary-sourceFiles/*.png"],
				tasks: [
					"sprite:secondary",
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
			//"uglify",
		//"sprite",
		//"image_resize",
		"sass_globbing",
		"sass:dist",
		"autoprefixer",//autoprefix css,
		//"cmq",//combine media queries
		//"csso",//minify css (css optimiser)
			//"copy",
		//"watch"
	]);

};