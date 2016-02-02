
<?php

function drupalListing($listingData = []){

	$listingData['items'] = defaultTo($listingData['items'],
		get('current','subnav')
	);

	$listingData['settings'] = defaultTo($listingData['settings'], [
		'pagination' => true,
	]);

	$contentExample =
	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed emolumenta communia esse dicuntur, recte autem facta et peccata non habentur communia. Audio equidem philosophi vocem...</p>';


	echo '
	<div class="listing">
		<div class="view view-a-listing-page-of-basic-page-content-types view-id-a_listing_page_of_basic_page_content_types view-display-id-page view-dom-id-c747f9306789d80691200c66c96c7c8c">
			<div class="view-content">';

				foreach($listingData['items'] as $i => $item){
					$item = defaultTo($item, [
						'title' => 'Heading '.($i+1),
						'link' => '#',
						'content' => $contentExample,
					]);
					$id =  idSafe($item['title']);

					echo
					'<div class="views-row views-row-1 views-row-odd views-row-first">
					    <div id="node-5" class="node node-page node-teaser clearfix" about="/node/5" typeof="foaf:Document">

					        <h2><a href="'.$item['link'].'">'.$item['title'].'</a></h2>

						    <span property="dc:title" content="Yet another basic page" class="rdf-meta element-hidden"></span>
							<span property="sioc:num_replies" content="0" datatype="xsd:integer" class="rdf-meta element-hidden"></span>

							<div class="content clearfix">
							    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
									<div class="field-items">
										<div class="field-item even" property="content:encoded">
											'.$item['content'].'
										</div>
									</div>
								</div>
							</div>

							<div class="link-wrapper">
								<ul class="links inline">
									<li class="node-readmore first last">
										<a href="/node/5" rel="tag" title="'.$item['title'].'">Read more<span class="element-invisible"> about '.$item['title'].'</span></a>
									</li>
								</ul>
							</div>
						</div>
					</div>';
				}

			echo '
			</div>
		</div>
	</div>';

	if ($listingData['settings']['pagination']){
		drupalPagination();
	}

}

?>
