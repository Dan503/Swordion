<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <?php heading(1); ?>
    <p>Our <?php infoTip('Enterprise Agreement', 'A written agreement about working conditions and wages made between an employer and its employees.
Expense	Total value of all of the resources consumed in producing goods and services') ?> 
 came into effect on 1 July 2011 and nominally expired on 30 June 2014. This Agreement covered all non-<?php infoTip('SES', 'Senior Executive Service') ?> 
 staff employed under the <em>Public Service Act 1999. </em>As at 30 June 2015, 434 staff were covered by this Agreement.</p>
    <p>On 6 June 2014, the Secretary issued the Notice of Employee Representational Rights to initiate bargaining for the next Enterprise Agreement: the new Enterprise Agreement was agreed by staff on 9 July. The Department of Communications Enterprise Agreement 2015&ndash;18 came into effect on 17 August 2015.</p>
    <?php heading(2); ?>
    <p>The terms and conditions of employment for SES staff are contained in individual determinations made under sub-section 24(1) of the <em>Public Service Act 1999</em>. These instruments set the remuneration and employment conditions for SES staff and provide for non-salary inclusions relating to leave arrangements and entitlements, superannuation, salary sacrifice, travel and either a motor vehicle under the Executive Vehicle Scheme (or payment of an allowance in lieu of a motor vehicle).</p>
    <p><a href="<?php echo $contentRoot.'5/3/1.php' ?>">See Appendix 3 for statistics on employment instrument coverage and SES remuneration</a>.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>

<?php
    caseStudy(array(
        'file' => 'being-digital-leader.php',
        'img' => 'bureau-of-comms-research.jpg',
        'title' => 'Being a digital leader within the Australian Government',
        'imgAlt' => 'antenna on a roof',
    ));
?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
