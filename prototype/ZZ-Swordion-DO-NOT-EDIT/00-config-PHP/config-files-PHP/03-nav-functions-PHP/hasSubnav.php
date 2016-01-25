<?php
function hasSubnav($item){
	return $item['subNavigable'] && isset($item['subnav']);
}
?>