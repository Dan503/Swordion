<?php

function drupalPagination($settings = array()){
	$location = $_GET['location'];
	echo '
	<h2 class="element-invisible">Pages</h2>
	<div class="item-list">
		<ul class="pager">
			<li class="pager-first first"><a title="Go to first page" href="?location='.$location.'&page=1">first</a></li>
			<li class="pager-previous"><a title="Go to previous page" href="?location='.$location.'&page=2">previous</a></li>
			<li class="pager-item"><a title="Go to page 1" href="?location='.$location.'&page=1">1</a></li>
			<li class="pager-item"><a title="Go to page 2" href="?location='.$location.'&page=2">2</a></li>
			<li class="pager-current">3</li>
			<li class="pager-item"><a title="Go to page 4" href="?location='.$location.'&page=4">4</a></li>
			<li class="pager-item"><a title="Go to page 5" href="?location='.$location.'&page=5">5</a></li>
			<li class="pager-next"><a title="Go to next page" href="?location='.$location.'&page=4">next</a></li>
			<li class="pager-last last"><a title="Go to last page" href="?location='.$location.'&page=5">last</a></li>
		</ul>
	</div>';
}

?>