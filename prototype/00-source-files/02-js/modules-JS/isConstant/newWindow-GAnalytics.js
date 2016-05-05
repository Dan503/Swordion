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
			$(this).addClass('downloadLink-JS').addClass('downloadLink--'+file_type+'-JS');

		//if file type is an image and is on a touch device
		} else if ($.inArray(file_type,image_types) > -1 && $('html').hasClass('touch')){
			$(this).addClass('imageLink-JS');
		};

	//Share links

		var isLinkedId = href.match("^http://www.linkedin.com"),
			isTwitter = href.match("^http://twitter.com/intent/tweet"),
			isFacebook = href.match("^http://www.facebook.com/sharer"),
			isEmail = href.match("^mailto:?")
			baseShareClass = 'shareLink';

		if ( isLinkedId || isTwitter ||	isFacebook){
			$(this).addClass(baseShareClass+'-JS');
		};

		if (isLinkedId) {
			$(this).addClass(baseShareClass+'--linkedIn-JS');

		} else if (isTwitter) {
			$(this).addClass(baseShareClass+'--twitter-JS');

		} else if (isFacebook) {
			$(this).addClass(baseShareClass+'--facebook-JS');

		} else if (isEmail) {
			$(this).addClass('emailShare-JS');
		}

	//podcast link
		if (href.match('^http://www.itunes.com')){
			$(this).addClass('podcastLink-JS');
		};

	//External links
		if (
			href.match("^http") &&
			href.indexOf(window.location.host) === -1 &&
			!$(this).hasClass('shareLink-JS') &&
			!$(this).hasClass('podcastLink-JS') &&

			//add data-jshook="newWindow__exclusion" to an external link to prevent it opening in a new window
			!$(this).is('[data-jshook*="newWindow__exclusion"]')
		){
			$(this).addClass('externalLink-JS');
		};

	};

	//once all links have been processed
	if (i == $('a:not([href^="javascript"])').length - 1){
		//any specific new window links get listed here
		var all_new_window_links = '.downloadLink-JS, .imageLink-JS, .externalLink-JS, .podcastLink-JS';

		//Google analytics download tracking
		$('body').on('click','.downloadLink-JS', function(){
			var url = $(this).attr('href');
			var classStart = 'downloadLink--';
			var self = $(this);
			var text = self.text();

			$.each(file_types, function(i){
				var extension = file_types[i];
				if (self.hasClass(classStart+extension+'-JS')) {
					trackEvent('Download - ' + extension, 'click', G_pageTitle + ' | ' + text + ' | ' + url);
				}
			});
		});

		//Google analytics external link tracking
		$('body').on('click','.externalLink-JS', function(){
			var url = $(this).attr('href');
			trackEvent('Outbound', 'click', G_pageTitle + ' | ' + url);
		});

		//Google analytics external link tracking
		$('body').on('click','.podcastLink-JS', function(){
			var url = $(this).attr('href');
			trackEvent('Podcast', 'click', G_pageTitle + ' | ' + url);
		});

		$('body').on('click','.emailShare-JS', function(){
			trackEvent('Email share', 'click', G_pageTitle);
		});

		//Share link functionality and Google analytics tracking
		$('body').on('click','.shareLink-JS', function(e){
			preventDefault(e);
			var url = $(this).attr('href');

			var classStart = 'shareLink--';

			if ($(this).hasClass(classStart + 'twitter-JS')){
				var window_name = "Share on Twitter";
				var width = 600;
				var height = 260;
				trackEvent('Twitter share', 'click', G_pageTitle);

			} else if ($(this).hasClass(classStart + 'linkedIn-JS')){
				var window_name = "Share on LinkedIn"
				var width = 600;
				var height = 400;
				trackEvent('LinkedIn share', 'click', G_pageTitle);

			} else if ($(this).hasClass(classStart + 'facebook-JS')){
				var window_name = "Share on Facebook"
				var width = 600;
				var height = 400;
				trackEvent('Facebook share', 'click', G_pageTitle);
			}

		    // Fixes dual-screen position                         Most browsers      Firefox
		    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
		    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

		    w = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
		    h = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;


		    var left = ((w / 2) - (width / 2)) + dualScreenLeft;
		    var top = ((h / 2) - (height / 2)) + dualScreenTop;

			window.open(url, window_name, 'scrollbars=yes, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
		});

		$(all_new_window_links).addClass("newWindow-JS");

		$('body').on('click', all_new_window_links, function(e){
			//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
			preventDefault(e);
			window.open($(this).attr('href'));
		})
	}
});

//Code for tracking Google Analytics events
function trackEvent(category,action,label) {
	//".replace(/(\r\n|\n|\r)/gm,"")" removes any line breaks
	var eventCat = category.replace(/(\r\n|\n|\r)/gm,"").trim();
	var eventAct = action.replace(/(\r\n|\n|\r)/gm,"").trim().toLowerCase();
	var eventLabel = label.replace(/(\r\n|\n|\r)/gm,"").trim();

    try {
        ga('send', 'event', eventCat, eventAct, eventLabel); //Uncomment when Google Analytics has been incorporated into the site
        //console.log("GA event = category: " + eventCat + ", action: " + eventAct + ", label: " + eventLabel);
		//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
    } catch(err){}

}

