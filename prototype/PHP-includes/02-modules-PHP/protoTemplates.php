
<?php /* This is where the list of prototype templates gets built */ ?>

<!-- prototype only -->
<div class="protoTemplates" data-jshook="protoTemplates__target protoTemplates__closer">
	<div class="protoTemplates__body">
		<h2 class="protoTemplates__heading">Templates</h2>
		<span tabindex="0" class="protoTemplates__focus" data-jshook="protoTemplates__focus"></span>
		<ul class="protoTemplates__list TK-noDots">
			<?php
				foreach(get(['templateList'], 'subnav') as $item){
					$activeClass = strtolower($get['current']['template']) == strtolower($item['title']) ?
						' protoTemplates__link--isActive' : '';
					echo '
					<li class="protoTemplates__item">
						<a href="'.$item['link'].'" class="btn protoTemplates__link'.$activeClass.'" data-jshook="protoTemplates__link">'.$item['title'].'</a>
					</li>
					';
				}
			?>
		</ul>
	</div>
</div>
<!-- end prototype only -->
