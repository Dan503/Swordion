
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
	});

	grunt.initConfig({
		pkg: grunt.file.readJSON("package.json"),

		//Minimises JS.
		//First I need to find a way to easily switch between min and non min js for debugging before I start using this.
		/*uglify: {
			my_target: {
				options: {
					sourceMap: true
				},
				files: {
					"assets/js/_main.min.js": ["assets/js/_main.js"],
					"assets/js/js-loader.min.js": ["assets/js/js-loader.js"]
				}
			}
		},*/

		//For generating iconfonts... doesn't work on PC :(
		/*webfont: {
			icons: {
				src: 'assets/images/svg/icon-font/*.svg',
				dest: 'build/fonts',
				options: {
					types: 'eot,woff,ttf,svg',
					engine: 'node'
				}
			}
		},*/

		//compiles the SASS
		sass: {
			dist: {
				options: {
					style: "compact",

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
					'assets/css/media-merge/': ['assets/css/*.css']
				}
			}
		},
		cssmin: {
		  add_banner: {
		    options: {
		      banner: '/* Simmilar mediaqueries have been merged and CSS has been Minified in this file (Not to be loaded into the browser during site development) */'
		    },
			//takes the current css files in the "media-merge" folder, minifies them, adds '.min.css' to the end of the file, and copies them back into the main css folder
		    files: [{
		      expand: true,
		      cwd: 'assets/css/media-merge/',
		      src: ['*.css', '!*.min.css'],
		      dest: 'assets/css/',
		      ext: '.min.css'
		    }]
		  }
		},
		notify: {
			css: {
				options: {
					enabled: true,
					title: "Grunt task complete",
					message: "[sass:dist] finished"
				}
			},
			js: {
				options: {
					enabled: true,
					title: "Grunt task complete",
					message: "[js] finished"
				}
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
				files: ["assets/js/*.js"],
				tasks: [
					//"uglify", //minimise JS
					//"copy:js", //copy js to canberra server
					//"notify:js"
				],
				options: {
					spawn: false
				}
			},
			scss: {
				files: ["**/*.scss"],
				tasks: [
					"sass:dist", //compile the SASS
					//"autoprefixer", //add prefixing (I do it with mixins)
					"cmq", //merge media queries
					"cssmin",
					//"copy:css", //copy css to canberra server
					"notify:css",//notify successfull sass compilation
				],
				options: {
					spawn: false
				}
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
		//"uglify",
		"sass:dist",
		//"autoprefixer",
		"cmq",
		"cssmin",
		"notify:css",
		//"copy",
		"watch"
	]);

};