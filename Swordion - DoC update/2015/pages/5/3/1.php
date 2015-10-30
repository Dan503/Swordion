<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?>

<?php mainContentPiece('top'); ?>

     <?php heading(1); ?>

    <table>
    <thead>
		<tr>
			<th>Staffing</th>
			<th>Numbers</th>
		</tr>
	</thead>
        <tbody>
            <tr><th>Ongoing Full-time Male</th><td>153</td></tr>
            <tr><th>Ongoing Full-time Female</th><td>184</td></tr>
            <tr><th>Ongoing Part-time Male</th><td>13</td></tr>
            <tr><th>Ongoing Part-time Female</th><td>35</td></tr>
            <tr><th>Non-Ongoing Full-time Male</th><td>11</td></tr>
            <tr><th>Non-Ongoing Full-time Female</th><td>27</td></tr>
            <tr><th>Non-Ongoing Part-time Male</th><td>1</td></tr>
            <tr><th>Non-Ongoing Part-time Female</th><td>4</td></tr>
            <tr><th>Non-Ongoing Male</th><td>_</td></tr>
            <tr><th><strong>Total</strong></th><td><strong>428</strong></td></tr>
        </tbody>
    </table>


    <p>Note: These figures include staff employed by the Department as at 30 June 2015 and exclude all inoperative staff*. These figures include the departmental Secretary.</p>
    <p>* Inoperatives are defined as those staff who were recorded as being on leave without pay as at 30 June 2015 for a total period greater than 13 weeks.</p>
    <?php heading(2); ?> 
    <table>
     <thead>
		<tr>
			<th>Classification</th>
			<th colspan="3">State</th>
            <th>Classification total</th>
		</tr>
	</thead>
        <tbody>
            <tr>
                <th></th>
                <td>ACT</td>
                <td>NSW</td>
                <td>VIC</td>
                <td></td>
            </tr>
            <tr>
                <th><?php infoTip('APS', 'Australian Public Service') ?>
 1</th>
                <td>4</td>
                <td>&mdash;</td>
                <td>&mdash;</td>
                <td><strong>4</strong></td>
            </tr>
            <tr>
                <th>APS 2</th>
                <td>2</td>
                <td>&mdash;</td>
                <td>&mdash;</td>
                <td><strong>2</strong></td>
            </tr>
            <tr>
                <th>APS 3</th>
                <td>15</td>
                <td>&mdash;</td>
                <td>&mdash;</td>
                <td><strong>15</strong></td>
            </tr>
            <tr>
                <th>APS 4</th>
                <td>43</td>
                <td>1</td>
                <td>1</td>
                <td><strong>45</strong></td>
            </tr>
            <tr>
                <th>APS 5</th>
                <td>53</td>
                <td>1</td>
                <td>&mdash;</td>
                <td><strong>54</strong></td>
            </tr>
            <tr>
                <th>APS 6</th>
                <td>90</td>
                <td>2</td>
                <td>&mdash;</td>
                <td><strong>92</strong></td>
            </tr>
            <tr>
                <th>EL 1</th>
                <td>120</td>
                <td>13</td>
                <td>&mdash;</td>
                <td><strong>133</strong></td>
            </tr>
            <tr>
                <th>EL 2</th>
                <td>55</td>
                <td>&mdash;</td>
                <td>1</td>
                <td><strong>56</strong></td>
            </tr>
            <tr>
                <th><?php infoTip('SES', 'Senior Executive Service') ?>
B 1</th>
                <td>18</td>
                <td>1</td>
                <td>&mdash;</td>
                <td><strong>19</strong></td>
            </tr>
            <tr>
                <th>SES B 2</th>
                <td>3</td>
                <td>2</td>
                <td>&mdash;</td>
                <td><strong>5</strong></td>
            </tr>
            <tr>
                <th>SES B 3</th>
                <td>2</td>
                <td>&mdash;</td>
                <td>&mdash;</td>
                <td><strong>2</strong></td>
            </tr>
            <tr>
                <th>SEC 1</th>
                <td>1</td>
                <td>&mdash;</td>
                <td>&mdash;</td>
                <td><strong>1</strong></td>
            </tr>
            <tr>
                <th><strong>Location total</strong></th>
                <td><strong>406</strong></td>
                <td><strong>20</strong></td>
                <td><strong>2</strong></td>
                <td><strong>428</strong></td>
            </tr>
        </tbody>
    </table>

    <p>Note: The above data is based on substantive classifications. Local designations such as Legal and Public Affairs have been subsumed into the equivalent APS or EL levels. The departmental Secretary is included. Inoperative staff are excluded.</p>
        <?php heading(3); ?> 
    <table>
    <thead>
    <tr>
    <th>
    SES Staff
    </th>
    <th>
    Female
    </th>
    <th>
    Male
    </th>
    <th>
    SES total
    </th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th>
    SES B1
    </th>
    <td>
    10
    </td>
    <td>
    9
    </td>
    <td>
    <strong>19</strong>
    </td>
    </tr>
    <tr>
    <th>
   SES B2
    </th>
    <td>
    2
    </td>
    <td>
    3
    </td>
    <td>
    <strong>5</strong>
    </td>
    </tr>
    <tr>
    <th>
   SES B3
    </th>
    <td>
    1
    </td>
    <td>
    1
    </td>
    <td>
    <strong>2</strong>
    </td>
    </tr>
    <tr>
    <td>
    <strong>Gender total</strong>
    </td>
    <td>
    <strong>13</strong>
    </td>
    <td>
    <strong>13</strong>
    </td>
    <td>
    <strong>26</strong>
    </td>
    </tr>
    </tbody>
    </table>
    <p>Note: These figures reflect substantive occupancy and exclude inoperative staff.</p>
     <?php heading(4); ?> 
    <table>
    <thead>
    <tr>
    <th>
    Male
    </th>
    <th>
    Female
    </th>
    <th>
    Total staff 1
    </th>
    <th>
    DCLB
    </th>
    <th>
    ATSI
    </th>
    <th>
    PWD
    </th>
    <th>
    Total staff 2
    </th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>
    178
    </td>
    <td>
    250
    </td>
    <td>
    <strong>428</strong>
    </td>
    <td>
    58
    </td>
    <td>
    3
    </td>
    <td>
    11
    </td>
    <td>
    <strong>72</strong>
    </td>
    </tr>
    <tr>
    <td>
    <strong>42%</strong>
    </td>
    <td>
    <strong>58%</strong>
    </td>
    <td>
    <strong>&mdash;</strong>
    </td>
    <td>
    <strong>13.5%</strong>
    </td>
    <td>
    <strong>0.7%</strong>
    </td>
    <td>
    <strong>2.6%</strong>
    </td>
    <td>
    <strong>16.8%</strong>
    </td>
    </tr>
    </tbody>
    </table>
    <p><strong>Key to Table 5.6</strong></p>
    <p>Total staff 1: Ongoing and non-ongoing staff based on their substantive classification as at 30 June 2015.</p>
    <p>Total staff 2: Total number of staff who chose to provide EEO information and this may include 'no' responses to some questions.</p>
    <p>DCLB: Staff who reported they are from diverse linguistic backgrounds.</p>
    <p>ATSI: Aboriginal and/or Torres Strait Islander peoples.</p>
    <p>PWD: Staff who reported they have a disability.</p>
    <p>Note: The above table excludes inoperative staff.</p>
     <?php heading(5); ?> 
    <table>
	<thead>
    <tr>
    <th>
    <strong>Classification</strong>
    </th>
    <th>
    <strong><?php infoTip('Enterprise Agreement', 'A written agreement about working conditions and wages made between an employer and its employees.
Expense	Total value of all of the resources consumed in producing goods and services') ?>
<br /> Salary Range ($)<br /> Lowest</strong>
    </th>
    <th>
    <strong>Enterprise Agreement
<br /> Salary Range ($)<br /> Highest</strong>
    </th>
    <th>
    <strong>Individual Arrangements*<br /> Salary Range ($)<br /> Lowest</strong>
    </th>
    <th>
    <strong>Individual Arrangements*<br /> Salary Range ($)<br /> Highest</strong>
    </th>
    </tr>
	</thead>

    <tbody>
    <tr>
    <th>
    <strong><?php infoTip('APS', 'Australian Public Service') ?>
1</strong>
    </th>
    <td>
    43,224
    </td>
    <td>
    47,466
    </td>
    <td>
    N/A
    </td>
    <td>
    N/A
    </td>
    </tr>
    <tr>
    <th>
    <strong>APS 2</strong>
    </th>
    <td>
    48,629
    </td>
    <td>
    53,900
    </td>
    <td>
    N/A
    </td>
    <td>
    N/A
    </td>
    </tr>
    <tr>
    <th>
    <strong>APS 3</strong>
    </th>
    <td>
    55,305
    </td>
    <td>
    59,751
    </td>
    <td>
    N/A
    </td>
    <td>
    N/A
    </td>
    </tr>
    <tr>
    <th>
    <strong>APS 4</strong>
    </th>
    <td>
    61,989
    </td>
    <td>
    66,995
    </td>
    <td>
    N/A
    </td>
    <td>
    N/A
    </td>
    </tr>
    <tr>
    <th>
    <strong>APS 5</strong>
    </th>
    <td>
    69,110
    </td>
    <td>
    75,308
    </td>
    <td>
    80,307
    </td>
    <td>
    83,141
    </td>
    </tr>
    <tr>
    <th>
    <strong>APS 6</strong>
    </th>
    <td>
    76,207
    </td>
    <td>
    92,224
    </td>
    <td>
    92,224
    </td>
    <td>
    113,394
    </td>
    </tr>
    <tr>
    <th>
    <strong>EL1</strong>
    </th>
    <td>
    92,637
    </td>
    <td>
    122,404
    </td>
    <td>
    112,454
    </td>
    <td>
    130,675
    </td>
    </tr>
    <tr>
    <th>
    <strong>EL2</strong>
    </th>
    <td>
    106,791
    </td>
    <td>
    143,263
    </td>
    <td>
    138,156
    </td>
    <td>
    154,268
    </td>
    </tr>
    <tr>
    <th>
    <strong>APS </strong>
    </th>
    <td>
    N/A
    </td>
    <td>
    N/A
    </td>
    <td>
    165,360
    </td>
    <td>
    290,000
    </td>
    </tr>
    </tbody>
    </table>
    <p>Note: Part-time salaries have been annualised to full-time for comparison. This table excludes all inoperative staff. Classifications with local designations such as Legal and Public Affairs have been subsumed into the equivalent APS or EL levels.</p>
    <p>* Includes Individual Flexibility Arrangements and section 24(1) Determinations and supplementary arrangements.</p>
    <?php heading(6); ?> 
    <table>
    <thead>
    <tr>
    <th>
    Classification
    </th>
    <th>
    Number of staff paid
    </th>
    <th>
    Aggregate amount ($)
    </th>
    <th>
    Average amount ($)
    </th>
    <th>
    Lowest amount ($)
    </th>
    <th>
    Highest amount ($)
    </th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th>
    EL1
    </th>
    <td>
    18
    </td>
    <td>
    109,082.19
    </td>
    <td>
    6,060.12
    </td>
    <td>
    2,482.19
    </td>
    <td>
    11,000
    </td>
    </tr>
    <tr>
    <th>
    EL2
    </th>
    <td>
    21
    </td>
    <td>
    205,258.63
    </td>
    <td>
    9,774.22
    </td>
    <td>
    5,498.63
    </td>
    <td>
    14,000
    </td>
    </tr>
    <tr>
    <th>
    Total
    </th>
    <td>
    <strong>&nbsp;</strong>
    </td>
    <td>
    <strong>314,340.82</strong>
    </td>
    <td>
    <strong>&mdash;</strong>
    </td>
    <td>
    <strong>&mdash;</strong>
    </td>
    <td>
    <strong>&mdash;</strong>
    </td>
    </tr>
    </tbody>
    </table>
    <p>Note: Classifications with local designations, for example Legal and Public Affairs, have been subsumed into equivalent APS or EL levels. This table includes all staff who received a performance payment for 2014&ndash;15 (includes terminated and inoperative staff as at 30 June 2015).</p>
     <?php heading(7); ?> 
    <table>
    <thead>
    <tr>
    <th>
    Classification
    </th>
    <th>
    Number of staff paid
    </th>
    <th>
    Aggregate amount ($)
    </th>
    <th>
    Average amount ($)
    </th>
    <th>
    Lowest amount ($)
    </th>
    <th>
    Highest amount ($)
    </th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th>
    <strong>EL1</strong>
    </th>
    <td>
    1
    </td>
    <td>
    6,014.53
    </td>
    <td>
    6,014.53
    </td>
    <td>
    6,014.53
    </td>
    <td>
    6,014.53
    </td>
    </tr>
    <tr>
    <th>
    <strong>EL2</strong>
    </th>
    <td>
    2
    </td>
    <td>
    19,353.87
    </td>
    <td>
    9,676.94
    </td>
    <td>
    4,313.12
    </td>
    <td>
    15,040.75
    </td>
    </tr>
    <tr>
    <th>
    <strong>Total</strong>
    </th>
    <td>
    <strong>3</strong>
    </td>
    <td>
    <strong>25,368.40</strong>
    </td>
    <td>
    <strong>&mdash;</strong>
    </td>
    <td>
    <strong>&mdash;</strong>
    </td>
    <td>
     <strong>&mdash;</strong>
    </td>
    </tr>
    </tbody>
    </table>
    <p>Note: Classifications with local designations such as Legal and Public Affairs have been subsumed into the equivalent APS or EL levels.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?>

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
