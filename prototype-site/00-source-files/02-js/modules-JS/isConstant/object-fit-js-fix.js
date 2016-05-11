

if ( ! Modernizr.objectfit && Modernizr.backgroundsize) {
  $('.bgImg img').each(function () {
        imgUrl = $(this).prop('src');

  		$(this)
			.css('opacity',0)
			.parent()
				.css({
		  			'backgroundImage' :'url(' + imgUrl + ')',
					'backgroundSize' : 'cover',
					'backgroundPosition' : 'center',
		  		});
  	}
  );
}

