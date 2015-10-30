<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <?php heading(1); ?>
    <p><a class="enlargeImg" data-jshook="enlargeImg__trigger" href="#lightbox__deptCommsOrgChart" title="Enlarge image"><img src="/2015/assets/images/content/organisation-chart.jpg.png" alt="Figure 1.2 Department of Communications organisation chart as at 30 June 2015"/></a></p>

	<div class="TK-visHid"><!-- << remove the space from the class name when done to hide this section -->
		<h3>Executive</h3>
		<p><strong>Drew Clarke:</strong> Executive</p>

		<h4>Infrastructure</h4>
		<p><strong>Ian Robinson: </strong>Deputy Secretary</p>
		<ul>
			<li>
				<h5>orange key label goes here</h5>
				<ul>
					<li>
						<h6>Infrastructure Deployment</h6>
						<p><strong>Jo Grainger:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Infrastructure Security &amp; Resilience</h6>
						<p><strong>Simon Cordina:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Broadband Implementation</h6>
						<p><strong>Duncan McIntyre:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Market Structure</h6>
						<p><strong>Philip Mason:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Spectrum</h6>
						<p><strong>Brain Kelleher:</strong> Assistant Secretary</p>
					</li>
				</ul>
			</li>
			<li>
				<h5>dark blue key label goes here</h5>
				<ul>
					<li>
						<h6>Market analysis</h6>
						<p><strong>Kathryn Ries:</strong> Director</p>
					</li>
				</ul>
			</li>
			<li>
				<h5>light blue key label goes here</h5>
				<ul>
					<li>
						<h6>Executive Policy Adviser</h6>
						<p><strong>Imogen Colton</strong></p>
					</li>
				</ul>
			</li>
		</ul>

		<h4>Consumer &amp; Content</h4>
		<p><strong>Simon Pelling:</strong> First Assistant Secretary</p>
		<ul>
			<li>
				<h5>Orange key label goes here</h5>
				<ul>
					<li>
						<h6>Consumer Access</h6>
						<p><strong>Sylvia Spaseski:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Consumer Protection</h6>
						<p><strong>Rohan Buettel:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Media</h6>
						<p><strong>Ann Campton:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Postal Services</h6>
						<p><strong>Lachlann Paterson:</strong> Assistant Secretary</p>
					</li>
				</ul>
			</li>
			<li>
				<h5>dark blue key label goes here</h5>
				<ul>
					<li>
						<h6>Market Analysis</h6>
						<p><strong>Andrew Biggs:</strong> Director</p>
					</li>
				</ul>
			</li>
		</ul>

		<h4>Digital Productivity</h4>
		<p><strong>Marianne Cullen:</strong> First Assistant Secretary</p>
		<ul>
			<li>
				<h5>Orange key label goes here</h5>
				<ul>
					<li>
						<h6>Digital Innovation</h6>
						<p><strong>Claire McFarland:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Data Policy</h6>
						<p><strong>Helen Owens:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Project Office</h6>
						<p><strong>Andrew Madsen:</strong> Assistant Secretary</p>
					</li>
				</ul>
			</li>
			<li>
				<h5>dark blue key label goes here</h5>
				<ul>
					<li>
						<h6>Market Analysis</h6>
						<p><strong>Emmanuel Njuguna:</strong> Director</p>
					</li>
					<li>
						<h6>International Engagement and Strategy</h6>
						<p><strong>Caroline Greenway:</strong> Director</p>
					</li>
				</ul>
			</li>
			<li>
				<h5>light blue key label goes here</h5>
				<ul>
					<li>
						<h6>Executive Policy Adviser</h6>
						<p><strong>Graeme Wolff</strong></p>
					</li>
				</ul>
			</li>
		</ul>

		<h4><?php infoTip('Bureau of Communications Research', 'The Department&rsquo;s independent economic and statistical research unit') ?> 
</h4>
		<p><strong>Dr Paul Paterson:</strong> Chief Economist</p>
		<ul>
			<li>
				<h5>Orange key label goes here</h5>
				<ul>
					<li>
						<h6>Executive Director</h6>
						<p><strong>Liz O'Shea:</strong> Assistant Secretary</p>
					</li>
				</ul>
			</li>
		</ul>

		<h4>Corporate</h4>
		<p><strong>Kurt Munro (a/g):</strong> First Assistant Secretary</p>
		<ul>
			<li>
				<h5>Orange key label goes here</h5>
				<ul>
					<li>
						<h6>Digital Communications</h6>
						<p><strong>Kim Ulrick:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Human Resources</h6>
						<p><strong>Debbie Kerrins:</strong> Assistant Secretary</p>
					</li>
					<li>
						<h6>Finance &amp; Risk Management</h6>
						<p><strong>Lynnere Gray (a/g):</strong> Assistant Secretary</p>
					</li>
				</ul>
			</li>
			<li>
				<h5>dark blue key label goes here</h5>
				<ul>
					<li>
						<h6>Information Technology</h6>
						<p><strong>Megan Henry (a/g):</strong> Chief Information Officer</p>
					</li>
					<li>
						<h6>Corporate Services</h6>
						<p><strong>Kim Mihalyka:</strong> Director</p>
					</li>
				</ul>
			</li>
		</ul>

		<h4>Office of the General Counsel</h4>
		<p><strong>Angela Flannery:</strong> General Counsel</p>
		<ul>
			<li>
				<h5>Orange key label goes here</h5>
				<ul>
					<li>
						<h6>Deputy General Counsel</h6>
						<p><strong>Trudy Bean</strong></p>
					</li>
				</ul>
			</li>
			<li>
				<h5>dark blue key label goes here</h5>
				<ul>
					<li>
						<h6>Executive Legal Officer, Regulatory</h6>
						<p><strong>Kylie Browne</strong></p>
					</li>
				</ul>
			</li>
			<li>
				<h5>light blue key label goes here</h5>
				<ul>
					<li>
						<h6>Executive Legal Officer, Projects</h6>
						<p><strong>Caterina Laria</strong></p>
					</li>
				</ul>
			</li>
		</ul>

		<h4>Strategy</h4>
		<p><strong>Nerida O'Loughlin:</strong> Deputy Secretary</p>
		<ul>
			<li>
				<h5>Orange key label goes here</h5>
				<ul>
					<li>
						<h6>Strategy</h6>
						<p><strong>Andrew Maurer:</strong> Assistant Secretary</p>
					</li>
				</ul>
			</li>
		</ul>
	</div>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?>

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>

