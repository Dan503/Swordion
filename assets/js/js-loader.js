
///*================================================*\
//	CONDITIONAL JS LOADER
//----------------------------------------------------
//	JS files that are loded onto the page only under
//	certain conditions will be loaded with this.
//	These files will be loaded first
//*================================================*/

//JS root defined in html for easy build integration
var plugin = js_root + 'plugins/conditional/';
var segment = js_root + 'modules/conditional/';

Modernizr.load([

/*********************************************\

	PLUGINS
==============================================
	Bits of code that you should never
	need to change that makes programing easier

\*******************************************/
	  {
		//respond allows IE 7 and 8 to use media queries
		//only use respond if absolutely necesary. We don't support mobile or tablet sized screens for IE7 and 8
	  	//test : $('html.lt-ie9').length,
		//yep  : [/*plugin + 'respond.min.js']
	  },
	  {
	  	//allows all browsers to use the placeholder attribute
	  	test : Modernizr.input.placeholder,
	    nope  : plugin + '_placeholders.min.js'
	  },
	  {
		//remodal lightbox plugin (if you have constant lightboxes, move it to the constant plugins area)
		test : $('[data-remodal-id]').length,
		yep  : [plugin + 'remodal.min.js'],
	  },

	  /*****************************\
  			scroll based code
	  \*****************************/
	  {
	  	//allows for scroll based animations
		// SKROLLR WILL NOT WORK ON MOBILE/TABLET DEVICES
		// It is possible to get it to work... but the multistage animations won't work anymore if you do
		test: $(window).width() > bp_desktop,
	  	yep : plugin + '_skrollr.min.js',
	  	complete: function(){
	  		var s;
	  		if($(window).width() > bp_desktop){
				s = skrollr.init({forceHeight: false});
			}
	  	}
	  },


/*********************************************\

	MODULES
==============================================
	large sections of code that are really
	only used in specific circumstances
	(eg. a home rotator)

\*******************************************/
	{
		test : $('.lt-ie10').length,
		yep: segment + 'ie-hacks.js'
	},
	{
		//General form Javascript
		test : $('input[type="browse"]').length || $('select').length,
		yep  : segment + '_form.js'
	},
	/*{
		//test if browser supports media queries
		test : Modernizr.mq('only all'),
		yep  : segment + '_media-queries.js'
	},*/
]);
