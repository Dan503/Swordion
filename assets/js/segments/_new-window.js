/**********************************************************************************\
  open PDFs, docs, external site links (start with http://), etc in a new window
\**********************************************************************************/

//Now includes google analytics integration

var file_types = ['pdf','doc','docx','xls','xlsx','ppt','pptx','txt','mp3'];
var image_types = ['jpg','gif','png'];

$('a:not([href^="javascript"])').each(function(i){
	var href = $(this).attr('href');

	if (typeof href !== 'undefined'){
	//for download links and image links
		var file_type = href.substr((href.lastIndexOf('.') +1)).toLowerCase();

		//if file type is in the accepted list of file types...
		if ($.inArray(file_type,file_types) > -1){
			$(this).addClass('download-link');

		//if file type is an image and is on a touch device
		} else if ($.inArray(file_type,image_types) > -1 && $('html').hasClass('touch')){
			$(this).addClass('image-link');
		};

	//Share links
		if (
			href.match("^http://www.linkedin.com") ||
			href.match("^http://twitter.com") ||
			href.match("^http://www.facebook.com")
		){
			$(this).addClass('share-link');
		};

	//podcast link
		if (href.match('^http://www.itunes.com')){
			$(this).addClass('podcast-link');
		};

	//External links
		if (
			href.match("^http") &&
			href.indexOf(window.location.host) === -1 &&
			!$(this).hasClass('share-link') &&
			!$(this).hasClass('podcast-link')
		){
			$(this).addClass('external-link');
		};

	};

	//once all links have been processed
	if (i == $('a:not([href^="javascript"])').length - 1){
		//any specific new window links get listed here
		var all_new_window_links = $('.download-link, .image-link, .external-link, .podcast-link');

		//Google analytics download tracking
		$('.download-link').click(function(){
			var url = $(this).attr('href');
			trackEvent('Download', 'click', url);
		});

		//Google analytics external link tracking
		$('.external-link').click(function(){
			var url = $(this).attr('href');
			trackEvent('Outbound', 'click', url);
		});

		//Google analytics external link tracking
		$('.podcast-link').click(function(){
			var url = $(this).attr('href');
			trackEvent('Podcast', 'click', url);
		});

		//Share link functionality and Google analytics tracking
		$('.share-link').each(function(){
			var url = $(this).attr('href');
			$(this).attr('href','javascript:void(0)').attr('data-href',url);
		}).click(function(){
			var url = $(this).attr('data-href');

			if ($(this).hasClass('twitter')){
				var window_name = "Share on Twitter";
				var width = 600;
				var height = 450;
				trackEvent('Twitter share', 'click', url);
			} else if ($(this).hasClass('linkedin')){
				var window_name = "Share on LinkedIn"
				var width = 600;
				var height = 500;
				trackEvent('LinkedIn share', 'click', url);
			} else if ($(this).hasClass('facebook')){
				var window_name = "Share on Facebook"
				var width = 600;
				var height = 500;
				trackEvent('Facebook share', 'click', url);
			}
			window.open(url,window_name,'scrollbars=yes,width='+width+',height='+height);
		});

		all_new_window_links.addClass("new-window").click(function(){window.open(this.href);return!1});
	}
});

//Code for tracking Google Analytics events
function trackEvent(category,action,label) {
	//".replace(/(\r\n|\n|\r)/gm,"")" removes any line breaks
	var eventCat = category.replace(/(\r\n|\n|\r)/gm,"").trim();
	var eventAct = action.replace(/(\r\n|\n|\r)/gm,"").trim().toLowerCase();
	var eventLabel = label.replace(/(\r\n|\n|\r)/gm,"").trim().toLowerCase();
    try {
        //ga('send', 'event', eventCat, eventAct, eventLabel); //Uncomment when Google Analytics has been incorporated into the site
        console.log("GA event = category: " + eventCat + ", action: " + eventAct + ", label: " + eventLabel);
		//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
    } catch(err){}
}