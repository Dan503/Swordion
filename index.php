<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

$location = array(0);

$hasSideBar = false;

$lightboxSets = array(
	'home',
);

$exactLightboxes = array (
	'other/test-other'
);

include '02-base/structure/body.php';

$modulePath = '01-modules/siteMain/';

$modulePath_home = $modulePath.'home/';

?>



<div class="demo">
	<div class="demo__div demo__mediaQuery">
		<p>Media Query example</p>
		<p class="TK-desktopOnly">Desktop only</p>
		<p class="TK-tabletOnly">Tablet only</p>
		<p class="TK-mobileOnly">Mobile only</p>
		<p class="TK-nonMobile">Non mobile</p>
		<p class="TK-nonTablet">Non tablet</p>
		<p class="TK-nonDesktop">Non desktop</p>
	</div>

	<div class="demo__div demo__gradient">
		<p>Gradient example</p>
	</div>

	<div class="demo__div demo__multiGrad">
		<p>Multi Gradient example</p>
	</div>

	<div class="demo__div relative">
		<p>Triangle &amp; centered example</p>
		<div class="demo__triangle"></div>
	</div>

	<div class="demo__div">
		<p><i class="sprite-pdf"></i>retina pdf sprite class</p>
		<p><i class="sprite-nonRetina-podcast"></i>standard podcast sprite class</p>
		<p><i class="demo-autoSprite"></i>Sprite added using mixin</p>
	</div>

	<div class="demo__div">
		<p class="icon-pdf">pdf icon class</p>
		<p class="demo__icon">icon added using mixin</p>
	</div>

	<div class="demo__div">
		<p class="demo__kfAnimate">KF Animation example</p>
		<p class="demo__kfAnimate--multi">KF Animation example</p>
	</div>

	<div class="demo__themes">
		<p class="demo__div themed__header">Themed header</p>
		<p class="demo__div themed__nav">Themed nav</p>
		<p class="demo__div themed__footer">Themed footer</p>
	</div>
</div>

<h2>Nav example</h2>
<nav class="grid grid--noWrap grid--vAlign grid--padding-5 navExample">

		<?php
			$items_array = array(
				array(
					'text' => 'very very very long item, do not mess with me',
					'link' => '#item1_1',
				), array(
					'text' => 'short',
					'link' => '#item0_1',
				), array(
					'text' => 'Normal sized item',
					'link' => '#item2_1',
				), array(
					'text' => 'looooo ooooooooo ooooooooo oooong',
					'link' => '#item4_1',
				),
			);

			for ($i = 0; $i < count($items_array); $i++) {
				$text = $items_array[$i]['text'];
				$link = $items_array[$i]['link'];
				echo
				'<a href="'.$link.'" class="grid__cell navExample__link">
					<span class="grid__vAlignHelper">'.$text.'</span>
				</a>';
			}
		?>


</nav>

<div class="full-screen-div-example" data-jshook="fullScreen__screenFill">
	<h2>Full screen div example</h2>
	<p>Scroll down to see more content</p>
</div>

				<div class="content">

						<h2>To do list:</h2>
						<ol>
							<li>Create a flexbox version of the grid class</li>
							<li>Add the animation Javascript stuff from the DoC project</li>
							<li>Add an example of a responsive youtube video</li>
							<li>Change structure to allow for BEM structuring. Look into <a href="https://github.com/mksanderson/crank" title="">Matt S&rsquo;s Crank starter kit</a> for ideas on folder structure and see what else his kit does</li>
							<li>Add <a href="http://vodkabears.github.io/remodal/#" title="">jQuery remodal lightbox</a> so it&rsquo;s ready to go on any project (need to add the js and create a backup cross icon)</li>
							<li>Change the styling for the select boxes to the type that requires a little bit of JS</li>
							<li>Make ready to go, custom styled checkboxes and radio buttons</li>
							<li>Make the media query mixin automatically convert pixel values to em values</li>
							<li>Make a zip download icon</li>
							<li>Make grunt compile always loaded files into a single js file</li>
							<li>Make js load minified files - make it easy to switch for development</li>
							<li>Get selectivizor to work.</li>
							<!--<li>get <a href="https://www.npmjs.org/package/grunt-svg2png">svg2png</a> grunt plugin working</li>--><!--I don't think we'll use this-->
							<li>Create a content manageable pure css pie chart</li>
						</ol>

						<h2>Test list</h2>
						<ul>
							<li>Lorem ipsum
								<ul>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
								</ul>
							</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
						</ul>

						<ol>
							<li>Lorem ipsum
								<ol>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
								</ol>
							</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
						</ol>

						<h2>Heading</h2>
						<p>Quae qui non vident, nihil umquam magnum ac cognitione dignum amaverunt. Itaque nostrum est-quod nostrum dico, artis est-ad ea principia, quae accepimus. Duo Reges: constructio interrete. Sed quanta sit alias, nunc tantum possitne esse tanta. Id est enim, de quo quaerimus. Varietates autem iniurasque fortunae facile veteres <a href="http://www.googl.com" title="">philosophorum</a> praeceptis instituta vita superabat. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Hos contra singulos dici est melius. Sed tamen enitar et, si minus multa mihi occurrent, non fugiam ista popularia. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium.</p>

<h2>Pure CSS pointing arrows !</h2>

	<ul>
		<li>Up arrow <span class="arrow up"></span></li>
		<li>Down arrow <span class="arrow down"></span></li>
		<li>Left arrow <span class="arrow left"></span></li>
		<li>Right arrow <span class="arrow right"></span></li>
	</ul>



<h2>Animations</h2>

<h3>Test animation</h3>
<div class="testAnimation">
stages test
</div>

<div class="rapidTest">
rapid stages test
<ul>
	<?php
		$items_array = array(
			'item0_0',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
			'xxxxxxx',
		);

		for ($i = 0; $i < count($items_array); $i++) {
			$item = $items_array[$i];
			$text = $item['text'];
			$link = defaultTo($item['link'],'#');
			echo
			'<li class="rapidTest__element"><a href="'.$link.'">'.$text.'</a></li>';
		}
	?>
</ul>
</div>

<h3>Simple re-usable pop-in animation</h3>

<ul class="popinDemo grid grid--enableWrapping grid--vAlign grid--thirds grid--hasInners grid--gutter-20 grid--padding-10 grid--border-3" data-jshook="popins">
<?php
	for ($i = 0; $i < 6; $i++) {
		$extra = '';
		if ($i==2){
			$extra = ' extra text for testing';
		}
		echo
		'<li class="popinDemo__piece grid__cell animationDemoItem">
			<div class="grid__inner">
				<div class="grid__vAlignHelper">Pop-in item '.($i+1).$extra.'</div>
			</div>
		</li>';
	};
?>
</ul>

<h3>Simple multistage animation</h3>
<ul id="js-simpleExampleElement" class="grid grid--halves grid--enableWrapping grid--gutter-10 simpleAnimationExample">
<?php
	for ($i = 0; $i < 4; $i++) {
		echo
		'<li class="simple'.($i+1).' simpleAnimationExample__piece grid__cell animationDemoItem">'.
			'Staged animation item '.($i+1).
		'</li>';
	}
?>
</ul>

<h2>Form styles</h2>

<form method="get" action="#">
	<fieldset>
		<div class="form__row">
			<ul>
				<?php
					$radio_array = array(
						'radio1',
						'radio2',
						'radio3'
					);
					for ($i = 0; $i < count($radio_array); $i++) {
						$radio_id = preg_replace("/[^A-Za-z0-9]/", "", $radio_array[$i]);
						echo
						'<li>
							<input id="'.$radio_id.'" type="radio" name="radio_name" />
							<label for="'.$radio_id.'">'.$radio_array[$i].'</label>
						</li>';
					}
				?>
			</ul>
		</div>
		<div class="form__row">
			<ul>
				<?php
					$checkbox_array = array(
						'checkbox1',
						'checkbox2',
						'checkbox3'
					);
					for ($i = 0; $i < count($checkbox_array); $i++) {
						$checkbox_id = preg_replace("/[^A-Za-z0-9]/", "", $checkbox_array[$i]);
						echo
						'<li>
							<input id="'.$checkbox_id.'" type="checkbox" />
							<label for="'.$checkbox_id.'">'.$checkbox_array[$i].'</label>
						</li>';
					}
				?>
			</ul>
		</div>
<?php
	$input_array = array(
		array(
			'label' => 'xxxxxxxxx1',
			'placeholder' => 'Enter text here'
		),
		array(
			'label' => 'xxxxxxxxx2',
			'placeholder' => 'Enter text here'
		),
		array(
			'label' => 'xxxxxxxxx3',
			'placeholder' => 'Enter text here'
		),
	);
	for ($i = 0; $i < count($input_array); $i++) {

		$label = $input_array[$i]['label'];
		$id = idSafe($label);
		$placeholder = $input_array[$i]['placeholder'];

		echo
		'<div class="from__row">
			<label for="'.$id.'">'.$label.'</label>
			<input id="'.$id.'" placeholder="'.$placeholder.'" type="text"/>
		</div>';
	}
?>
		<div class="form__row">
			<label for="styledBrowse">Styled browse button</label>
			<input id="styledBrowse" type="file" />
		</div>
		<div class="form__row">
			<label for="styledSelect">Styled select</label>
			<select id="styledSelect">
				<option>Select box</option>
				<option>xxxxxx</option>
				<option>xxxxxx</option>
			</select>
		</div>
		<div class="form__row">
			<input type="submit" />
			<input type="reset" />
		</div>
	</fieldset>
</form>


<div class="hyphenTest">
	<h2>Hyphenation test</h2>
	<p>Transmogrification</p>
</div>

<div id="equalTest">
	<div>
		fbhsdjkfbsjkfb<br>
		fsjkhnwejkfhn<br>
		jfsdjsdfjf
	</div>
	<div>
		dfsfklsdfklsd
	</div>
	<br>
	<div>
		fhnsdjkf<br>
		fsdjksd
	</div>
	<div>mjsdfkl</div>
</div>

			<ul class="downloads">
				<li><a href="downloads/sample.pdf">PDF</a> <small>(2MB)</small></li>
				<li><a href="downloads/sample.docx">Word</a> <small>(2.5MB)</small></li>
				<li><a href="downloads/sample.xls">Excel</a> <small>(2MB)</small></li>
				<li class="exclude"><a href="downloads/sample.pptx">Powerpoint</a> <small>(3MB)</small></li>
				<li><a href="downloads/sample.txt">Text</a> <small>(100KB)</small></li>
				<li><a href="downloads/sample.mp3">Audio</a> <small>(10MB)</small></li>
				<li><a href="http://www.itunes.com">Podcast</a></li>
				<li><a href="#" class="htmlDownload">For the rare instances when a html icon is necessary</a></li>
				<li><a href="http://www.example.com" title="example of an external link">External link</a></li>
			</ul>

			</div>


<?php include '02-base/structure/foot.php'; ?>
