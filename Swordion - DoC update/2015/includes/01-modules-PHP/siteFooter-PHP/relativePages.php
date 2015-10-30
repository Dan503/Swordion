
<div class="relativePages">
	<div class="TK-pageWidth">
		<div class="relativePages__grid grid grid--cols-3">
			<?php if ($getCurrent['isNavigable']){ ?>
				<div class="relativePages__block relativePages__inSection grid__cell grid__cell--span-2">
					<div class="relativePages__inner">
						<?php if (!$isHome){ ?>
							<h2 class="relativePages__heading">Also in this section</h2>

							<ul class="relativePages__list TK-noDots">
								<?php
									$inSection_array = $navMap
											[$location[0]]
											['subNav'];

									for ($i = 0; $i < count($inSection_array); $i++) {
										$item = $inSection_array[$i];
										$title = $item['title'];
										$link = defaultTo($item['link'], '#');

										if ($i != $location[1] && $item['isNavigable']){
											echo
											'<li class="relativePages__item">
												<a href="'.$link.'" class="relativePages__link">
													<span class="relativePages__linkInner">'.$title.'</span>
												</a>
											</li>';
										}
									}
								?>
							</ul>
						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<?php if (isset($getNext)) { ?>

				<a href="<?php echo defaultTo($getNext['link'],'#') ?>" class="relativePages__block relativePages__upNext grid__cell">
					<div class="relativePages__inner">
						<h2 class="relativePages__heading">Up next</h2>
						<p class="relativePages__item"><?php

							if ($getCurrent['title'] == 'Compliance index') {
								echo '<strong>07</strong> Case Studies';
							} else if (!isset($getStrictNext) && !isset($getNextParent)) {
								echo
								'<strong>0'.($location[0] + 1).'</strong> '.
								$getNextGrandParent['title'];
							} else {
								echo $getNext['title'];
							}

						?></p>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
</div>