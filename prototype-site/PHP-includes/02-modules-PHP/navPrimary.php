
<ul class="navPrimary grid grid--hasInners">
	<?php
		foreach($navMap['subnav'] as $i => $item){
			$activeClass = amCurrentlyUnder($item) ? ' -isActive' : '';
	?>
		<li class="navPrimary__item grid__cell<?php echo $activeClass; ?>">
			<a href="<?php echo $item['link'] ?>" class="navPrimary__link grid__inner<?php echo $activeClass; ?>"><?php echo $item['title'] ?></a>
		</li>
	<?php } ?>
</ul>
