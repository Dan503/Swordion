<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php mainContentPiece('top'); ?>

    <p>This report outlines the operations and performance of the Department of Communications for the financial year ending 30 June 2015. It has been prepared in accordance with the Requirements for Annual Reports issued by the Department of the Prime Minister and Cabinet in June 2015.</p>
    <p>Note that figures in tables and in the text of this report may be rounded. Figures in the text are generally rounded to one decimal place, while those in tables are generally rounded to the nearest thousand. Discrepancies in tables between totals and sums of components are due to rounding.</p>

    <?php heading(1); ?>
    <p>Includes a review of the year by the Secretary and an outline of the Department, performance reporting structure, functions and services, as well as an overview of the portfolio structure.</p>

    <?php heading(2); ?>
    <p>Reports on how our programmes performed during the year and how they contributed to achieving our outcome. We benchmark our achievements against deliverables and key performance indicators set out in our 2014&ndash;15 Portfolio Budget Statements.</p>

    <?php heading(3); ?>
    <p>Details our governance arrangements, management practices and outcomes and workforce management.</p>

    <?php heading(4); ?>
    <p>Contains our audited financial statements for 2014&ndash;15.</p>

    <?php heading(5); ?>
    <p>Supplementary information on a range of issues, such as a resource statement and expenses for outcome, reporting on legislation and statutory instruments, workforce demographics, and advertising and market research.</p>

    <?php heading(6); ?>
    <p>Provides a list of acronyms, glossary of terms, an alphabetical index and a compliance index.</p>

<?php mainContentPiece('mid'); ?>

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
