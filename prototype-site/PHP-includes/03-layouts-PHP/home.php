<?php
	$location = [0];
	$GLOBALS['layout_settings'] = [
		'isHome' => true,
	];
	include $head;
?>

<p>This image randomly loads from the "/content/4-random-images/example" folder on every page refresh.</p>

<p><img src="<?php echo randomImg('example'); ?>" alt="" /> </p>

<p>Content in the accordion is loaded from the content folder using loadContent() function</p>
<?php accordion(); ?>

<div class="demo">

	<div class="demo__div TK-relative">
		<i class="demo__searchIcon TK-centered" tabindex="0"></i>
	</div>

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

	<div class="demo__div TK-relative">
		<p>Triangle &amp; centered example</p>
		<div class="demo__triangle TK-centered"></div>
	</div>

	<div class="demo__div">
		<p class="icon-pdf">pdf icon class</p>
		<p class="demo__icon">icon added using mixin</p>
	</div>

	<div class="demo__div">
		<p class="demo__kfAnimate">KF Animation example</p>
		<p class="demo__kfAnimate--multi">KF Animation example</p>
	</div>
</div>

<?php
	video('jVpfVk__W0k', array(
		'id' => 'idForVideo',
		'text' => 'text is mainly used in relation to the tile attribute on video for screen readers',
		'classes' => 'classes-you-wish-to-apply-to-video-element',
		'wrapper-hooks' => 'JS-hooks-to-apply-to-wrapping-div',
		'hooks' => 'JS-hooks-to-apply-directly-to-the-iFrame'
	));
?>

				<div class="standardContent">

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
						<p>Quae qui non vident, nihil umquam magnum ac cognitione dignum amaverunt. Itaque nostrum est-quod nostrum dico, artis est-ad ea principia, quae accepimus. Duo Reges: constructio interrete. Sed quanta sit alias, nunc tantum possitne esse tanta. Id est enim, de quo quaerimus. Varietates autem iniurasque fortunae facile veteres <a href="http://www.google.com" title="">philosophorum</a> praeceptis instituta vita superabat. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Hos contra singulos dici est melius. Sed tamen enitar et, si minus multa mihi occurrent, non fugiam ista popularia. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium.</p>

<h2>Pure CSS pointing arrows !</h2>

	<ul>
		<li>Up arrow <span class="arrow up"></span></li>
		<li>Down arrow <span class="arrow down"></span></li>
		<li>Left arrow <span class="arrow left"></span></li>
		<li>Right arrow <span class="arrow right"></span></li>
	</ul>

<h2>Form example</h2>
<p>An example of a basic form. the html and extra options can be seen in the basicForm.php function module file</p>

<?php
	basicForm([
		['label' => 'Basic text field'],
		['label' => 'Select box',
			'type' => 'select',
			'options' => [
				'option 1',
				'option 2',
				'option 3',
			]
		],
		['label' => 'Text area',
			'type' => 'textarea',
		],
		['label' => 'Check boxes',
			'type' => 'checkbox',
			'options' => [
				'option 1',
				'option 2',
				'option 3',
			]
		],
		['label' => 'Radio buttons',
			'type' => 'radio',
			'options' => [
				'option 1',
				'option 2',
				'option 3',
			]
		],
		['label' => 'Browse button',
			'type' => 'file',
		],
		['label' => 'Email',
			'type' => 'email',
		]
	], [
		'submit' => 'Custom submit text',
	]);
?>


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