<?php

function drupalPagination($settings = array()){
	$location = $_GET['location'];
	echo '
	<h2 class="element-invisible">Pages</h2>
	<div class="item-list">
		<ul class="pager">
			<li class="pager-first first"><a title="Go to first page" href="?location='.$location.'&page=1">first</a></li>
			<li class="pager-previous"><a title="Go to previous page" href="?location='.$location.'&page=1">previous</a></li>
			<li class="pager-item"><a title="Go to page 1" href="?location='.$location.'&page=1">1</a></li>
			<li class="pager-current">2</li>
			<li class="pager-item"><a title="Go to page 3" href="?location='.$location.'&page=3">3</a></li>
			<li class="pager-next"><a title="Go to next page" href="?location='.$location.'&page=3">next</a></li>
			<li class="pager-last last"><a title="Go to last page" href="?location='.$location.'&page=3">last</a></li>
		</ul>
	</div>';
}

?>