<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php
	sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop')));
?>

<?php mainContentPiece('top'); ?>

<ol class="TK-noDots definitions"><li><strong>ABS</strong> <span>Australian Bureau of Statistics</span></li>
      <li><strong>ACCAN</strong> <span>Australian Communications Consumer Action Network</span></li>
      <li><strong>ACCC</strong> <span>Australian Competition and Consumer Commission</span></li>
      <li><strong>ACMA</strong> <span>Australian Communications and Media Authority</span></li>
      <li><strong>ANAO</strong> <span>Australian National Audit Office</span></li>
      <li><strong>APS</strong> <span>Australian Public Service</span></li>
      <li><strong>APSC</strong> <span>Australian Public Service Commission</span></li>
      <li><strong>BCP</strong> <span>Business Continuity Plan</span></li>
      <li><strong>CAC</strong> <span><em>Commonwealth Authorities and Companies Act 1997</em></span></li>
      <li><strong>CLCs</strong> <span>Common Law Contracts</span></li>
      <li><strong>DTO</strong> <span>Digital Transformation Office</span></li>
      <li><strong>ELF</strong> <span>Executive Leadership Forum</span></li>
      <li><strong>EMG</strong> <span>Executive Management Group</span></li>
      <li><strong>FMA</strong> <span><em>Financial Management and Accountability Act 1997</em></span></li>
      <li><strong>FOI</strong> <span>Freedom of Information</span></li>
      <li><strong>FTTN</strong> <span>Fibre to the node</span></li>
      <li><strong>FTTP</strong> <span>Fibre to the premises</span></li>
      <li><strong>GHz</strong> <span>Gigahertz</span></li>
      <li><strong>HAS</strong> <span>Household Assistance Scheme</span></li>
      <li><strong>HFC</strong> <span>Hybrid-fibre coaxial</span></li>
      <li><strong>IPND</strong> <span>Integrated Public Number Database</span></li>
      <li><strong>IRC</strong> <span>Implementation Risk Committee</span></li>
      <li><strong>Mbps</strong> <span>Megabits per second</span></li>
      <li><strong>MHz</strong> <span>Megahertz</span></li>
      <li><strong>NBN</strong> <span>National Broadband Network</span></li>
      <li><strong>NFP</strong> <span>Not for profit</span></li>
      <li><strong>NGOs</strong>	<span>Non-government organsisations</span></li>
      <li><strong>NICTA</strong> <span>National Information Communications Technology Australia</span></li>
      <li><strong>NITV</strong> <span>National Indigenous Television</span></li>
      <li><strong>NRS</strong> <span>National Relay Service</span></li>
      <li><strong>PAES</strong> <span>Portfolio Additional Estimates Statements</span></li>
      <li><strong>PBS</strong> <span>Portfolio Budget Statements</span></li>
      <li><strong>PGPA</strong> <span><em>Public Governance and Performance Accountability Act 2013</em></span></li>
      <li><strong>PRC</strong> <span>Performance Reporting Committee</span></li>
      <li><strong>SES</strong> <span>Senior Executive Service</span></li>
      <li><strong>SSS</strong> <span>Satellite Subsidy Scheme</span></li>
      <li><strong>SSU</strong> <span>Structural Separation Undertaking</span></li>
      <li><strong>STS</strong> <span>Standard Telephone Service</span></li>
      <li><strong>TUSMA</strong> <span>Telecommunications Universal Service Management Agency</span></li>
      <li><strong>UHF</strong> <span>Ultra High Frequency</span></li>
      <li><strong>VAST</strong> <span>Viewer Access Satellite Television</span></li>
      <li><strong>VDSL</strong> <span>Very-High-Bit-Rate Digital Subscriber Line</span></li>
      <li><strong>WCC</strong> <span>Workplace Consultative Committee</span></li>
      <li><strong>YAG</strong> <span>Youth Advisory Group</span></li>
</ol>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?>

<?php mainContentPiece('bottom'); ?>

<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
