
<?php

function drupalPagination($settings = array()){
	$location = $_GET['location'];
	echo '
	<h2 class="element-invisible">Pages</h2>
	<div class="item-list">
		<ul class="pager">
			<li class="pager-first first"><a title="Go to first page" href="?location='.$location.'&page=1">« first</a></li>
			<li class="pager-previous"><a title="Go to previous page" href="?location='.$location.'&page=1">‹ previous</a></li>
			<li class="pager-item"><a title="Go to page 1" href="?location='.$location.'&page=1">1</a></li>
			<li class="pager-current">2</li>
			<li class="pager-item"><a title="Go to page 3" href="?location='.$location.'&page=3">3</a></li>
			<li class="pager-next"><a title="Go to next page" href="?location='.$location.'&page=3">next ›</a></li>
			<li class="pager-last last"><a title="Go to last page" href="?location='.$location.'&page=3">last »</a></li>
		</ul>
	</div>';
}

function drupalListing($array = array(
	['title' => 'Heading 1'],
	['title' => 'Heading 2'],
	['title' => 'Heading 3'],
)){
$contentExample =
'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed emolumenta communia esse dicuntur, recte autem facta et peccata non habentur communia. Audio equidem philosophi vocem, Epicure, sed quid tibi dicendum sit oblitus es. Satisne ergo pudori consulat, si quis sine teste libidini pareat? Tu autem negas fortem esse quemquam posse, qui dolorem malum putet. Qua tu etiam inprudens utebare non numquam. Expectoque quid ad id, quod quaerebam, respondeas. Rhetorice igitur, inquam, nos mavis quam dialectice disputare? </p>

<p>Duo Reges: constructio interrete. Isto modo, ne si avia quidem eius nata non esset. Serpere anguiculos, nare anaticulas, evolare merulas, cornibus uti videmus boves, nepas aculeis. Num igitur eum postea censes anxio animo aut sollicito fuisse? Laelius clamores sofòw ille so lebat Edere compellans gumias ex ordine nostros. Tum Torquatus: Prorsus, inquit, assentior; Igitur neque stultorum quisquam beatus neque sapientium non beatus. Eadem nunc mea adversum te oratio est. </p>';


echo '
<div class="view view-a-listing-page-of-basic-page-content-types view-id-a_listing_page_of_basic_page_content_types view-display-id-page view-dom-id-c747f9306789d80691200c66c96c7c8c">
	<div class="view-content">';

		foreach($array as $i => $item){
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
	</div>';

	drupalPagination();

}

?>
