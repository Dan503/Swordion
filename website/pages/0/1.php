<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

$location = array(3, 1, 1);

include $_SERVER['DOCUMENT_ROOT'].'/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php
	sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop')));
?>

<?php mainContentPiece('top'); ?>


<?php heading(1); ?>

<p><strong>This is purely an example page and not part of the actual report</strong></p>

	<p>The Department and NBN Co continued to work with key industry bodies and stakeholders to make sure processes for the migration of legacy services, such as medical and security alarms, are carried out to minimise the risk of losing functionality. <a href="#">To support this NBN</a> Co developed and launched the Medical Alarms Register on 21 March 2014, which allows end users to register their location information. We also continued to monitor <a href="http://www.google.com" title="external link">NBN Co's activities</a> and performance in brownfields and new developments, liaised with the company on its performance, examined implementation issues, consulted stakeholders, liaised with state and territory Governments, and provided information to the public and other stakeholders.</p>

	<ul>
		<li>With NBN Co we also agreed on how to transition from a mandatory to optional battery backup within the <?php infoTip('FTTP', 'The term residential fiber to the premises (FTTP) refers to equipment used in fiber access deployments where fibers extend all the way to the end-user premises and the equipment is designed and optimized for use in residential applications.') ?> footprint.
			<ul>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In qua quid est boni praeter summam voluptatem, et eam sempiternam? Si autem id non concedatur, non continuo vita beata tollitur. Quasi ego id curem, quid ille aiat aut neget.
					<ul>
						<li>Quae hic rei publicae vulnera inponebat, eadem ille sanabat.</li>
						<li>Hoc dicit? Quis est tam dissimile homini. Mihi enim satis est, ipsis non satis.</li>
						<li>Atque ab his initiis profecti omnium virtutum et originem et progressionem persecuti sunt.</li>
					</ul>
				</li>
				<li>Scientiam pollicentur, quam non erat mirum sapientiae cupido patria esse cariorem. Itaque ad tempus ad Pisonem omnes.</li>
				<li>Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate.</li>
			</ul>
		</li>
		<li>To make sure consumers are protected, the Australian Communications and Media Authority (<?php infoTip('ACMA', 'Australian Communications and Media Authority') ?> 
) has been consulting on developing an appropriate regulatory instrument that would require a retail service</li>
		<li>Provider to gain informed consent from a customer when deciding whether to accept or reject a battery backup unit being installed, and to keep</li>
		<li>Documented evidence of the consent. These processes should be finished by the end of 2014.</li>
	</ul>

	<p>We continued to strengthen our governance processes around managing issues that may affect service continuity in the transition to the NBN and the structural separation of fixed line services. Our Service Continuity Coordination Committee continued to meet monthly to coordinate departmental activities. Meanwhile we continued to work closely with key external stakeholders through the Service Continuity Assurance Working Group. The Group met every three months to discuss issues relating to NBN service transition.</p>

	<ol>
		<li>With NBN Co we also agreed on how to transition from a mandatory to optional battery backup within the FTTP footprint.
			<ol>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In qua quid est boni praeter summam voluptatem, et eam sempiternam? Si autem id non concedatur, non continuo vita beata tollitur. Quasi ego id curem, quid ille aiat aut neget.
					<ol>
						<li>Quae hic rei publicae vulnera inponebat, eadem ille sanabat.</li>
						<li>Hoc dicit? Quis est tam dissimile homini. Mihi enim satis est, ipsis non satis.</li>
						<li>Atque ab his initiis profecti omnium virtutum et originem et progressionem persecuti sunt.</li>
					</ol>
				</li>
				<li>Scientiam pollicentur, quam non erat mirum sapientiae cupido patria esse cariorem. Itaque ad tempus ad Pisonem omnes.</li>
				<li>Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate.</li>
			</ol>
		</li>
		<li>To make sure consumers are protected, the Australian Communications and Media Authority (<?php infoTip('ACMA', 'Australian Communications and Media Authority') ?> 
) has been consulting on developing an appropriate regulatory instrument that would require a retail service</li>
		<li>Provider to gain informed consent from a customer when deciding whether to accept or reject a battery backup unit being installed, and to keep</li>
		<li>Documented evidence of the consent. These processes should be finished by the end of 2014.</li>
	</ol>


<?php heading(2); ?>

	<p>The Department and NBN Co continued to work with key industry bodies and stakeholders to make sure processes for the migration of legacy services, such as medical and security alarms, are carried out to minimise the risk of losing functionality. To support this NBN Co developed and launched the Medical Alarms Register on 21 March 2014, which allows end users to register their location information. We also continued to monitor NBN Co's activities and performance in brownfields and new developments, liaised with the company on its performance, examined implementation issues, consulted stakeholders, liaised with state and territory Governments, and provided information to the public and other stakeholders.</p>

	<h3>Technical information read as a heading three</h3>

	<p>With NBN Co we also agreed on how to transition from a mandatory to optional battery backup within the FTTP footprint. To make sure consumers are protected, the Australian Communications and Media Authority (<?php infoTip('ACMA', 'Australian Communications and Media Authority') ?> 
) has been consulting on developing an appropriate regulatory instrument that would require a retail service provider to gain informed consent from a customer when deciding whether to accept or reject a battery backup unit being installed, and to keep documented evidence of the consent. These processes should be finished by the end of 2014.</p>

	<h4>Further details in a heading four</h4>

	<p>We continued to strengthen our governance processes around managing issues that may affect service continuity in the transition to the NBN and the structural separation of fixed line services. Our Service Continuity Coordination Committee continued to meet monthly to coordinate departmental activities. Meanwhile we continued to work closely with key external stakeholders through the Service Continuity Assurance Working Group. The Group met every three months to discuss issues relating to NBN service transition.</p>

<?php heading(3) ?>

	<p>We continued to strengthen our governance processes around managing issues that may affect service continuity in the transition to the NBN and the structural separation of fixed line services. Our Service Continuity Coordination Committee continued to meet monthly to coordinate departmental activities. Meanwhile we continued to work closely with key external stakeholders through the Service Continuity Assurance Working Group. The Group met every three months to discuss issues relating to NBN service transition.</p>

<?php mainContentPiece('mid'); ?>

<?php
	sidebar(array(
		array(
			'blockType' => 'nav',
			'navType' => 'desktopOnly'
		), array(
			'blockType' => 'twitter',
			'text' => 'Profound statement that can be used as a driver for people to share on social media'
		), array(
			'blockType' => 'moreInfo',
			'text' => 'Find out more linking over to other parts of the annual report from a breakout box',
			'btnText' => 'What&rsquo;s the NBN?',
			'link' => '#'
		), array(
			'blockType' => 'highlight',
			'icon'=> 'radio',
			'altText' => 'radio icon',
			'text' => 'Integer posuere erat a ante
venenatis dapibus '
		), array(
			'blockType' => 'moreInfo',
			'text' => 'Find out more linking over to other parts of the annual report from a breakout box',
			'btnText' => 'What&rsquo;s the NBN?',
			'link' => '#'
		), array(
			'blockType' => 'highlight',
			'icon'=> 'radio',
			'altText' => 'radio icon',
			'text' => 'Integer posuere erat a ante
venenatis dapibus '
		), array(
			'blockType' => 'twitter',
			'text' => 'Profound statement that can be used as a driver for people to share on social media'
		)
	));
?>

<?php mainContentPiece('bottom'); ?>

<?php
	caseStudy(array(
		'file' => 'bureau-of-comms-research.php',
		'img' => 'bureau-of-comms-research.jpg',
		'title' => 'Bureau of Communications Research',
		'imgAlt' => 'antenna on a roof',
	));
?>


<?php mainContentPiece('top', 'continued'); ?>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Eadem nunc mea adversum te oratio est. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. Idemne potest esse dies saepius, qui semel fuit? Quae similitudo in genere etiam humano apparet. Nam si amitti vita beata potest, beata esse non potest. Duo Reges: constructio interrete. Iam in altera philosophiae parte. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? Non est enim vitium in oratione solum, sed etiam in moribus. </p>

<p>Huius, Lyco, oratione locuples, rebus ipsis ielunior. Nihil opus est exemplis hoc facere longius. Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Occultum facinus esse potuerit, gaudebit; Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Venit ad extremum; Non est igitur voluptas bonum. Suam denique cuique naturam esse ad vivendum ducem. Sin eam, quam Hieronymus, ne fecisset idem, ut voluptatem illam Aristippi in prima commendatione poneret. Nemo igitur esse beatus potest. </p>

<p>Duo enim genera quae erant, fecit tria. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Est enim effectrix multarum et magnarum voluptatum. Si enim ad populum me vocas, eum. Si enim, ut mihi quidem videtur, non explet bona naturae voluptas, iure praetermissa est; Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate. Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; </p>


<?php mainContentPiece('mid'); ?>

<?php
	sidebar(array(
		array(
			'blockType' => 'twitter',
			'text' => 'Profound statement that can be used as a driver for people to share on social media'
		), array(
			'blockType' => 'moreInfo',
			'text' => 'Find out more linking over to other parts of the annual report from a breakout box',
			'btnText' => 'What&rsquo;s the NBN?',
			'link' => '#'
		), array(
			'blockType' => 'highlight',
			'icon'=> 'radio',
			'altText' => 'radio icon',
			'text' => 'Integer posuere erat a ante
venenatis dapibus '
		),
	));
?>

<?php mainContentPiece('bottom'); ?>


<?php
	imgPopout(array(
		'intro' => 'During 2013&ndash;14, the Department supported the Minister for Communications, the Hon Malcolm Turnbull MP and former ministers by providing advice on policy, regulatory and rollout issues associated with the National Broadband Network (NBN), and supported the Government to implement its NBN policy objectives.',
		'imgSrc' => '/assets/images/content/MalcolmTurnbull.jpg',
		'imgAlt' => 'Malcolm Turnbull',
		'heading' => 'Communications Minister Malcolm Turnbull',
		'content' => '<p>Malcolm Turnbull is a Liberal member of the House of Representatives and is currently Minister for Communications. He was Leader of the Opposition from 16 September 2008 to 1 December 2009 and prior to that Shadow Treasurer.</p>',
		'btnText' => 'More about the Minister',
		'btnLink' => '#',
	));
?>

<?php mainContentPiece('top', 'continued'); ?>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Eadem nunc mea adversum te oratio est. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. Idemne potest esse dies saepius, qui semel fuit? Quae similitudo in genere etiam humano apparet. Nam si amitti vita beata potest, beata esse non potest. Duo Reges: constructio interrete. Iam in altera philosophiae parte. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? Non est enim vitium in oratione solum, sed etiam in moribus. </p>

<p>Huius, Lyco, oratione locuples, rebus ipsis ielunior. Nihil opus est exemplis hoc facere longius. Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Occultum facinus esse potuerit, gaudebit; Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Venit ad extremum; Non est igitur voluptas bonum. Suam denique cuique naturam esse ad vivendum ducem. Sin eam, quam Hieronymus, ne fecisset idem, ut voluptatem illam Aristippi in prima commendatione poneret. Nemo igitur esse beatus potest. </p>

<p>Duo enim genera quae erant, fecit tria. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Est enim effectrix multarum et magnarum voluptatum. Si enim ad populum me vocas, eum. Si enim, ut mihi quidem videtur, non explet bona naturae voluptas, iure praetermissa est; Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate. Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; </p>


<?php mainContentPiece('mid'); ?>

<?php
	sidebar(array(
		array(
			'blockType' => 'moreInfo',
			'text' => 'Find out more linking over to other parts of the annual report from a breakout box',
			'btnText' => 'What&rsquo;s the NBN?',
			'link' => '#'
		), array(
			'blockType' => 'highlight',
			'icon'=> 'radio',
			'altText' => 'radio icon',
			'text' => 'Integer posuere erat a ante venenatis dapibus '
		),
	));
?>

<?php mainContentPiece('bottom'); ?>


<?php
	shoutOut(array(
		'highlight' => '
			<p>This is called a "Shout Out"</p>
			<p><strong>52,000 new homes connected to the NBN</strong></p>',

		'content' => '
			<p>Following the change of Government in September 2013, Shareholder Ministers announced a Strategic Review on 3 October 2013 to assess NBN Co Limited&rsquo;s (NBN Co) performance and the estimated time and cost to complete the NBN under a range of scenarios. On 8 April 2014, the Shareholder Ministers provided NBN Co with an updated Statement of Expectations, giving it flexibility and discretion in operational, technology and network design decisions to implement a Multi-Technology Mix NBN, as recommended in the Strategic Review.</p>

			<p>The company has started to prepare for the transition and has started fibre-to-the-building (FTTB) and fibre-to-the-node (FTTN) trials to evaluate construction, installation, operation, service performance and customer experiences.</p>

			<p>At the same time, NBN Co continued to rollout the NBN with construction of the NBN fibre network across all states and territories in Australia; rollout the NBN in new development areas it is responsible for; and rollout its fixed </p>',
	));
?>

<?php mainContentPiece('top', 'continued'); ?>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Eadem nunc mea adversum te oratio est. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. Idemne potest esse dies saepius, qui semel fuit? Quae similitudo in genere etiam humano apparet. Nam si amitti vita beata potest, beata esse non potest. Duo Reges: constructio interrete. Iam in altera philosophiae parte. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? Non est enim vitium in oratione solum, sed etiam in moribus. </p>

<p>Huius, Lyco, oratione locuples, rebus ipsis ielunior. Nihil opus est exemplis hoc facere longius. Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Occultum facinus esse potuerit, gaudebit; Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Venit ad extremum; Non est igitur voluptas bonum. Suam denique cuique naturam esse ad vivendum ducem. Sin eam, quam Hieronymus, ne fecisset idem, ut voluptatem illam Aristippi in prima commendatione poneret. Nemo igitur esse beatus potest. </p>

<p>Duo enim genera quae erant, fecit tria. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Est enim effectrix multarum et magnarum voluptatum. Si enim ad populum me vocas, eum. Si enim, ut mihi quidem videtur, non explet bona naturae voluptas, iure praetermissa est; Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate. Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; </p>


<?php mainContentPiece('mid'); ?>

<?php
	sidebar(array(
		array(
			'blockType' => 'twitter',
			'text' => 'Profound statement that can be used as a driver for people to share on social media'
		), array(
			'blockType' => 'moreInfo',
			'text' => 'Find out more linking over to other parts of the annual report from a breakout box',
			'btnText' => 'What&rsquo;s the NBN?',
			'link' => '#'
		),
	));
?>

<?php mainContentPiece('bottom'); ?>


<?php
	videoBlock(
		'Malcolm Turnbull launches the MyBroadband website which allows users to see the availability and quality of the fixed line broadband connections',
		//only this bit: http://grabilla.com/05814-cf4d34e5-99d8-40ee-847c-825f97c31523.png
		'pzMBZ0f--Xo'
	);
?>

<?php mainContentPiece('top', 'continued'); ?>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Eadem nunc mea adversum te oratio est. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. Idemne potest esse dies saepius, qui semel fuit? Quae similitudo in genere etiam humano apparet. Nam si amitti vita beata potest, beata esse non potest. Duo Reges: constructio interrete. Iam in altera philosophiae parte. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? Non est enim vitium in oratione solum, sed etiam in moribus. </p>

<p>Huius, Lyco, oratione locuples, rebus ipsis ielunior. Nihil opus est exemplis hoc facere longius. Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Occultum facinus esse potuerit, gaudebit; Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Venit ad extremum; Non est igitur voluptas bonum. Suam denique cuique naturam esse ad vivendum ducem. Sin eam, quam Hieronymus, ne fecisset idem, ut voluptatem illam Aristippi in prima commendatione poneret. Nemo igitur esse beatus potest. </p>

<p>Duo enim genera quae erant, fecit tria. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Est enim effectrix multarum et magnarum voluptatum. Si enim ad populum me vocas, eum. Si enim, ut mihi quidem videtur, non explet bona naturae voluptas, iure praetermissa est; Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate. Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; </p>


<?php mainContentPiece('mid'); ?>

<?php
	sidebar(array(
		array(
			'blockType' => 'twitter',
			'text' => 'Profound statement that can be used as a driver for people to share on social media'
		)
	));
?>

<?php mainContentPiece('bottom'); ?>

<?php
	accordion ('example', array(
		array(
			'heading' => 'Huge breakout area',
			'imgAlt' => 'Image alt text',
			'content' =>
				'<p>The Department and NBN Co continued to work with key industry bodies and stakeholders to make sure processes for the migration of legacy services, such as medical and security alarms, are carried out to minimise the risk of losing functionality. To support this NBN Co developed and launched the Medical Alarms Register on 21 March 2014, which allows end users to register their location information. We also continued to monitor NBN Co&rsquo;s activities and performance in brownfields and new developments, liaised with the company on its performance, examined implementation issues, consulted stakeholders, liaised with state and territory Governments, and provided information to the public and other stakeholders.</p>

<p>With NBN Co we also agreed on how to transition from a mandatory to optional battery backup within the FTTP footprint. To make sure consumers are protected, the Australian Communications and Media Authority (ACMA) has been consulting on developing an appropriate regulatory</p>'

		), array(
			'heading' => 'Hidden section, changes to yellow when clicked open',
			'imgAlt' => 'Image alt text',
		), array(
			'heading' => 'Another one beside it',
			'imgAlt' => 'Image alt text',
		),
	));
?>

<?php mainContentPiece('top', 'continued'); ?>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Eadem nunc mea adversum te oratio est. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. Idemne potest esse dies saepius, qui semel fuit? Quae similitudo in genere etiam humano apparet. Nam si amitti vita beata potest, beata esse non potest. Duo Reges: constructio interrete. Iam in altera philosophiae parte. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? Non est enim vitium in oratione solum, sed etiam in moribus. </p>

<p>Huius, Lyco, oratione locuples, rebus ipsis ielunior. Nihil opus est exemplis hoc facere longius. Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Occultum facinus esse potuerit, gaudebit; Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Venit ad extremum; Non est igitur voluptas bonum. Suam denique cuique naturam esse ad vivendum ducem. Sin eam, quam Hieronymus, ne fecisset idem, ut voluptatem illam Aristippi in prima commendatione poneret. Nemo igitur esse beatus potest. </p>

<p>Duo enim genera quae erant, fecit tria. Quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Est enim effectrix multarum et magnarum voluptatum. Si enim ad populum me vocas, eum. Si enim, ut mihi quidem videtur, non explet bona naturae voluptas, iure praetermissa est; Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate. Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; </p>


<?php mainContentPiece('mid'); ?>

<?php
	sidebar();
?>

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
