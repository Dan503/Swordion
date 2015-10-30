<div class="homeBGassets TK-modernOnly" aria-hidden="true" data-jshook="homeBGassets__stage">

	<div class="homeHeadToolsBG homeSplash__wrapper" data-jshook="homeSplash__wrapper">
		<div class="homeHeadToolsBG__inner">
			<div class="homeHeadToolsBG__menuBG homeHeadToolsBG__item TK-fill" data-jshook="homeSplash__menuBG"></div>
			<div class="homeHeadToolsBG__searchBG homeHeadToolsBG__item TK-fill" data-jshook="homeSplash__searchBG"></div>
		</div>
	</div>


	<div class="homeBGassets__background TK-fill TK-largeScreenOnly" data-jshook="homeBGassets__background"></div>

	<div class="homeBGassets__corner" data-jshook="homeBGassets__corner"></div>

	<div class="homeBGassets__deRegCorner" data-jshook="homeBGassets__deRegCorner"></div>

	<div class="ausPost__sideTri homeSideTri homeSideTri--usesOverlap" data-jshook="ausPost__tri">
		<div class="ausPost__triInner homeSideTri__outer">
			<div class="homeSideTri__inner">
				<div class="homeSideTri__content ausPost__triContent grid grid--vAlign">
					<div class="grid__cell TK-relative">
						<div class="ausPost__envelopes">
							<div class="ausPost__envelopeGroup ausPost__envelopeGroup--top">
								<?php
									$JShook_stay = 'ausPost__envelope--stay';
									$JShook_leave = 'ausPost__envelope--leave';

									for ($i = 0; $i < 25; $i++) {
										$stayers = array(1, 13, 4, 17, 9, 23);
										$stayHook = in_array($i+1, $stayers) ? $JShook_stay : $JShook_leave;
										echo
										'<div class="ausPost__envelope ausPost__envelope--top iconHome-email" data-jshook="ausPost__envelope ausPost__envelope--top '.$stayHook.'"></div>';
									}
								?>
							</div>
							<div class="ausPost__envelopeGroup ausPost__envelopeGroup--bottom">
								<?php
									for ($i = 0; $i < 27; $i++) {
										$stayers = array(1, 3, 4, 5, 16, 24, 25, 23);
										$stayHook = in_array($i+1, $stayers) ? $JShook_stay : $JShook_leave;
										echo
										'<div class="ausPost__envelope ausPost__envelope--bottom iconHome-email" data-jshook="ausPost__envelope ausPost__envelope--bottom '.$stayHook.'"></div>';
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="homeSideTri__negSpace homeSideTri__negSpace--top"></div>
			<div class="homeSideTri__negSpace homeSideTri__negSpace--top homeSideTri__negSpace--border"></div>
			<div class="homeSideTri__negSpace homeSideTri__negSpace--bottom"></div>
			<div class="homeSideTri__negSpace homeSideTri__negSpace--bottom homeSideTri__negSpace--border"></div>
		</div>
	</div>

</div>