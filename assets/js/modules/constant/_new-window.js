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
			$(this).addClass('JS-downloadLink').addClass('JS-downloadLink--'+file_type);

		//if file type is an image and is on a touch device
		} else if ($.inArray(file_type,image_types) > -1 && $('html').hasClass('touch')){
			$(this).addClass('JS-imageLink');
		};

	//Share links

		var isLinkedId = href.match("^http://www.linkedin.com"),
			isTwitter = href.match("^http://twitter.com/intent/tweet"),
			isFacebook = href.match("^http://www.facebook.com/sharer"),
			isEmail = href.match("^mailto:?")
			baseShareClass = 'JS-shareLink';

		if ( isLinkedId || isTwitter ||	isFacebook){
			$(this).addClass(baseShareClass);
		};

		if (isLinkedId) {
			$(this).addClass(baseShareClass+'--linkedIn');

		} else if (isTwitter) {
			$(this).addClass(baseShareClass+'--twitter');

		} else if (isFacebook) {
			$(this).addClass(baseShareClass+'--facebook');

		} else if (isEmail) {
			$(this).addClass('JS-emailShare');
		}

	//podcast link
		if (href.match('^http://www.itunes.com')){
			$(this).addClass('JS-podcastLink');
		};

	//External links
		if (
			href.match("^http") &&
			href.indexOf(window.location.host) === -1 &&
			!$(this).hasClass('JS-shareLink') &&
			!$(this).hasClass('JS-podcastLink')
		){
			$(this).addClass('JS-externalLink');
		};

	};

	//once all links have been processed
	if (i == $('a:not([href^="javascript"])').length - 1){
		//any specific new window links get listed here
		var all_new_window_links = '.JS-downloadLink, .JS-imageLink, .JS-externalLink, .JS-podcastLink';

		//Google analytics download tracking
		$('body').on('click','.JS-downloadLink', function(){
			var url = $(this).attr('href');
			var classStart = 'JS-downloadLink--';
			var self = $(this);
			var text = self.text();

			$.each(file_types, function(i){
				var extension = file_types[i];
				if (self.hasClass(classStart+extension)) {
					trackEvent('Download - ' + extension, 'click', pageTitle + ' | ' + text + ' | ' + url);
				}
			});
		});

		//Google analytics external link tracking
		$('body').on('click','.JS-externalLink', function(){
			var url = $(this).attr('href');
			trackEvent('Outbound', 'click', pageTitle + ' | ' + url);
		});

		//Google analytics external link tracking
		$('body').on('click','.JS-podcastLink', function(){
			var url = $(this).attr('href');
			trackEvent('Podcast', 'click', pageTitle + ' | ' + url);
		});

		$('body').on('click','.JS-emailShare', function(){
			trackEvent('Email share', 'click', pageTitle);
		});

		//Share link functionality and Google analytics tracking
		$('body').on('click','.JS-shareLink', function(e){
			preventDefault(e);
			var url = $(this).attr('href');

			var classStart = 'JS-shareLink--';

			if ($(this).hasClass(classStart + 'twitter')){
				var window_name = "Share on Twitter";
				var width = 600;
				var height = 260;
				trackEvent('Twitter share', 'click', pageTitle);

			} else if ($(this).hasClass(classStart + 'linkedIn')){
				var window_name = "Share on LinkedIn"
				var width = 600;
				var height = 400;
				trackEvent('LinkedIn share', 'click', pageTitle);

			} else if ($(this).hasClass(classStart + 'facebook')){
				var window_name = "Share on Facebook"
				var width = 600;
				var height = 400;
				trackEvent('Facebook share', 'click', pageTitle);
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

		$(all_new_window_links).addClass("JS-newWindow");

		$('body').on('click', all_new_window_links, function(e){
			//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
			preventDefault(e);
			window.open(this.href);
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
        //ga('send', 'event', eventCat, eventAct, eventLabel); //Uncomment when Google Analytics has been incorporated into the site
        console.log("GA event = category: " + eventCat + ", action: " + eventAct + ", label: " + eventLabel);
		//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
    } catch(err){}

}

