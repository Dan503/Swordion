
///*================================================*\
//	CONDITIONAL JS LOADER
//----------------------------------------------------
//	JS files that are loded onto the page only under
//	certain conditions will be loaded with this.
//	These files will be loaded first
//*================================================*/




	//JS root defined in html for easy build integration
	var plugin = js_root + 'plugins/';
	var segment = js_root + 'segments/';

	Modernizr.load([

/*********************************************\

	PLUGINS
==============================================
	Bits of code that you should never
	need to change that makes programing easier

\*******************************************/
	  {
	  	//allows old browsers to support enquire.min.js
        test: window.matchMedia,
        nope: plugin + '_media.match.min.js'
      },
	  {
	  	// gives the ability to use JS media queries
		//more info: http://wicky.nillia.ms/enquire.js/
		load: plugin + '_enquire.min.js'
	  },
	  {
	  	//test : $('html.lt-ie9').length,
		//yep  : [/*plugin + 'respond.min.js',*/ plugin + 'selectivizr.min.js']
		//TO DO: haven't got selectivizr to work yet :(

		//selectivizr allows the use of css3 selectors in your css for IE 6-8
		//respond allows IE 7 and 8 to use media queries
		//only use respond if absolutely necesary. We don't support mobile or tablet sized screens for IE7 and 8
	  },
	  {
	  	//allows all browsers to use the placeholder attribute
	  	test : Modernizr.input.placeholder,
	    nope  : plugin + '_placeholders.min.js'
	  },
	  {
	  	//allows youtube videos to obey their z-index (better to do this with back end code if possible)
	  	test : $("iframe").length,
	    yep  : plugin + '_iframe.js'
	  },
	  {
	  	//give elements equal heights in rows
	  	load : plugin + '_equal-heights.js'
	  },
	  /*{
		//allows you to easily scroll to particular elements on the page
	  	load : plugin + '_scroll-to-me.js';
	  },*/
	  /*{
		//Gives you full access to url attributes and parameters
		//documentation: https://github.com/allmarkedup/purl
	  	load : plugin + '_purl-URL-parser.2.3.1.js';
	  },*/
	  /*{
		//simplified url attribute obtaining to just query string and hash tag
	  	load : plugin + '_url-manipulation.js';
	  },*/
	  /*{
	  	//use this if you are using a nav with a mega menu.
		//Used in the same way as the jQuery .hover() function.
	  	load : plugin + '_hoverIntent.min.js'
	  },*/
	  {
	  	//Allows numbers to count up
	  	load : plugin + '_countUp.min.js',
	  },
	  /*{
	  	//Allows letters to have count up effect
	  	load : plugin + '_jquery.shuffleLetters.min.js',
	  },*/
	  {
	  	//desktop lightbox plugin
	  	test : $('.js-lightbox-btn').length,
		yep  : [plugin + '_jquery.custombox.js'],
		callback : function (){
			$('.js-lightbox-btn').click(function(e){
				var scroll_position = scroll_pos;
				$.fn.custombox( this, {
			        effect: 'sign',
					eClose: '.close-info-btn',
					scrollbar: false,
					complete: function(){
						//needed for keyboard accessability.
						//Place a hidden button (id="anchor") at the top of the loaded content
						$(this.url).find('#anchor').focus();
					}
			    });
			    e.preventDefault();
			});
		}
	  },

	  /*****************************\
  			scroll based code
	  \*****************************/
	  {
	  	//controls when infographic animations activate
	  	load: segment + '_scroll_animations.js'
	  },
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

	SEGMENTS
==============================================
	large sections of code that are really
	only used in specific circumstances
	(eg. a home rotator)

\*******************************************/

	  {
	  	//opens external links and documents in new windows
	  	load: segment + '_new-window.js'
	  },
	  {
	  	//General form Javascript
	  	test : $('input[type="browse"]').length || $('select').length,
	  	yep  : segment + '_form.js'
	  },
	  /*{
	  	load : segment + '_prototype-only.js'
	  },*/
	  /*{
	  	//test if browser supports media queries
	  	test : Modernizr.mq('only all'),
	  	yep  : segment + '_media-queries.js'
	  },*/
	  {
	  	//Small bits and pieces of code go here.
		//Write code here first, then turn it
		//into a segment if it starts getting really big.
	  	load : js_root + '_main.js'
	  },
	  {
	  	//loads in all the constant js files
	  	load : js_root + 'merged.js'
	  }
	]);
