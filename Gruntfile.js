
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
			folder: 'plugins--3rdParty-JS',
			//isSplit : true //(default)
		}, {
			folder: '00-variables-global-JS',
		}, {
			folder: '01-functions-global-JS',
			isSwordionFile: true,
		}, {
			folder: '01-functions-global-JS',
			isSwordionFile: false,
		}, {
			folder: 'plugins--1stParty-JS',
		}, {
			file: 'doc.ready-open.js',
			isSwordionFile: true,
			//usedIn : 'all', //(default)// other option is an array eg. ['isHome', 'isModern']
		}, {
			folder : 'modules-JS',
		}, {
			file: 'doc.ready-close.js',
			isSwordionFile: true,
		}
	]
};

//configure grunt concat options here
var JS_mergeConfig = {
	options: {
		banner: '/* This is a generated file. DO NOT EDIT!!! */'
	}
};

var JS_merge_files = {};

//generates an array of files delegated to each split
for (var x = 0; x < jsMerge.splits.length; x++){

	var root = '';
	var split = jsMerge.splits[x];

	JS_merge_files[split] = [];

	for (var i = 0; i < jsMerge.components.length; i++){

		var component = jsMerge.components[i];

		//default "isSwordionFile" to "false"
		component.isSwordionFile = component.isSwordionFile || false;

		//sets the root folder depending on if it is a swordion file or not
		root = component.isSwordionFile ?
			'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/js/' : //true
			'prototype/00-source-files/02-js/';

		//if it's a file
		if (typeof component.file !== 'undefined'){
			//default "usedIn" to "all"
			component.usedIn = component.usedIn || 'all';
			//if file is used in all, or current split is in the "usedIn" array
			if (component.usedIn == 'all' || component.usedIn.indexOf(split) > -1){
				JS_merge_files[split].push(root + component.file);
			}

		//else it's a folder
		} else {
			//default "isSplit" to "true"
			component.isSplit = component.isSplit || true;



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
		dest : 'prototype/assets/js/generated-JS/' + split + '.js'
	}

}

//use this to test the grunt concat code
//console.log(JS_mergeConfig);
//console.log(JS_merge_files);

//generates the grunt uglify syntax
var JS_minified_files = {};
for (var key in JS_merge_files) {
  if (JS_merge_files.hasOwnProperty(key)) {

  	JS_minified_files['prototype/assets/js/generated-JS/'+key+'.min.js'] = ['prototype/assets/js/generated-JS/'+key+'.js'];
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
		server_root =  '//CAN1DEV012/webs/folderName/';
		break;

// Mac OSX
	case 'darwin' :
		server_root =  '/Volumes/webs/folderName/';
		break;
}

module.exports = function (grunt) {

	//Avoids the need for the grunt.loadNpmTasks('xxx') commands
	//https://www.npmjs.org/package/jit-grunt
	require("jit-grunt")(grunt, {
		//for any grunt plugins that aren't working without grunt.loadNpmTasks("grunt_plugin_name");, list them here:
		// task_name: "grunt_plugin_name",
		watch: "grunt-contrib-watch",
		sprite: "grunt-spritesmith",
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
	            src: 'prototype/00-source-files/auto-sprite-images/HD-retina-sourcefiles/*.png',
	            dest: 'prototype/assets/images/auto-sprite/HD-retina-autosprite.png',
	            destCss: 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/01-sprite-sheets/HD-retina-sprites.scss',
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
	            src: 'prototype/00-source-files/auto-sprite-images/LD-nonRetina-sourceFiles/*.png',
	            dest: 'prototype/assets/images/auto-sprite/LD-nonRetina-autosprite.png',
	            destCss: 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/01-sprite-sheets/LD-nonRetina-sprites.scss',
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
			phase_1: {
				files: {
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/configurations/01-map-functions.scss': 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/00-functions-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/configurations/02-map-sprites.scss': 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/01-sprite-sheets-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/configurations/03-map-config.scss': 'prototype/00-source-files/01-sass/01-config-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/01-map-mixins.scss': 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/02-mixins-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/02-map-plugins.scss': 'prototype/00-source-files/01-sass/03-plugins-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/03-map-sw-base.scss': 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/04-base-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/04-map-base.scss': 'prototype/00-source-files/01-sass/04-base-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/05-map-forms.scss': 'prototype/00-source-files/01-sass/04-form-elements-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/06-map-modules.scss': 'prototype/00-source-files/01-sass/05-modules-SASS/**/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/07-map-extras.scss': 'prototype/00-source-files/01-sass/06-extras-SASS/**/*.scss',
				}
			},
			phase_2: {
				files: {
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/configurations.scss' : 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/configurations/*.scss',
					'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files.scss' : 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/main-files/*.scss'
				}
			},
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
					"prototype/assets/css/modern.css": "prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/modern.scss",
				}
			},
			ie9 : {
				files : {
					//IE9 style sheet
					"prototype/assets/css/ie9.css": "prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/ie9.scss",
				}
			},
			ie8 : {
				files : {
					//IE8 style sheet
					"prototype/assets/css/ie8.css": "prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/ie8.scss",
				}
			}
		},

		//css optimiser (minification) better than standard minification
		//http://bem.info/tools/optimizers/csso/description/
		csso: {
		  minify: {
		    options: {
		      banner: '/* Simmilar mediaqueries have been merged and CSS has been Minified in this file (Not to be loaded into the browser during site development) */'
		    },
			//takes the current css files in the "media-merge" folder, minifies them, adds '.min.css' to the end of the file, and copies them back into the main css folder
		      expand: true,
		      cwd: 'prototype/assets/css/',
		      src: ['modern.css','ie9.css','ie8.css'],
		      dest: 'prototype/assets/css/',
		      ext: '.min.css'
		  }
		},

		postcss: {
		    options: {
		      map: {
		          inline: false, // save all sourcemaps as separate files...
		      },

		      processors: [
		        require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
				require("css-mqpacker")()//merge media queries
		      ]
		    },
		    prefix_and_mergeMQs: {
		      src: 'prototype/assets/css/*.css'
		    }
		},
		// Keep files on server in sync with local copy
		// Extreamly useful at build stage
		sync: {
			js: {
				files: [
					// includes files within path
					{
						cwd: 'prototype/assets/js/',
						src: ['generated-JS/*.js'],
						dest: server_root + 'prototype/assets/js/generated-JS/',
					}
				],
				//pretend: true, // Don't do any IO. Before you run the task with `updateAndDelete` PLEASE MAKE SURE it doesn't remove too much.
				verbose: true // Display log messages when copying files
			},
			images: {
				files: [
					{
						src: 'prototype/assets/images/**',
						dest: server_root
					}
				],
				//pretend: true,
				verbose: true
			},
			css: {
				files: [
					{
						cwd: 'prototype/assets/css/',
						src: ['*.css', '*.map'],
						dest: server_root + 'prototype/assets/css/'
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
						cwd: 'prototype/assets/fonts/',
						src: ['**/**'],
						dest: server_root + 'prototype/assets/fonts/'
					}
				],
				//pretend: true,
				verbose: true
			}
		},

		ftpush: {
			uat: {
				auth: {
					host: 'prototype.projectName.aws1.adelphi.digital',
					port: '',
					authKey: 'uat'
				},
				dest: 'web/',
				src: 'prototype/',
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
					'**/**/*.js',//optional
					'!prototype/assets/js/generated-JS/*.js',
					'**/**/*.scss'//optional

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
				files: ["prototype/**/*.js", "!prototype/assets/js/generated-JS/*.js"],
				tasks: [
					"concat", //merges constant js files into one file
					//"uglify", //minify JS
					//"sync:js" //copy js to server
				],
				options: { spawn: false }
			},
			images: {
				files: ['prototype/assets/images/**'],
				tasks: [
					'image_resize',
					'sprite',
					//"sync:images" //copy js to server
				],
				options: { spawn: false }
			},
			scss: {
				files: [
					"prototype/**/*.scss", "!prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/import-maps/**/*.scss"],
				tasks: [
					"sass_globbing",//generates import maps for SASS modules
					"sass:modern", //compile the modern SASS (modern only by default for speed)
					//"sass:ie8", //compile the IE8 SASS
					//"sass:ie9", //compile the IE9 SASS
					"postcss"//merge media queries and add auto prefixing
					//"cmq", //merge media queries
					//"csso", //minify css
					//"sync:css" //copy css to server
				],
				options: { spawn: false }
			},
			html: {
				options: {
					livereload: true
				},
				//The other file types that will trigger a browser refresh on save
				tasks: [
					//"sync:html",
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
					//"sync:fonts",
				],
				files: [
					"prototype/assets/fonts/**/**"
				]
			}
		}

	});

	//don't bother with the grunt.loadNpmTasks('xxx'); commands. They are generated automatically

	//list the tasks in the order you want them done in
	grunt.registerTask("default", [
		'image_resize',//create 1/2 sized sprite images
		'sprite',//generate auto-sprite

		"concat",//merge JS files
		"uglify",//minify JS
		"sass_globbing", //merge SASS files
		"sass",//compile CSS files for all browsers when running the grunt command
		"postcss",//merge media queries and add auto prefixing
		"csso",//minify css (css optimiser)
			//"sync",//copy files to another location
		//"watch"//keep tabs on files looking out for changes
	]);

};