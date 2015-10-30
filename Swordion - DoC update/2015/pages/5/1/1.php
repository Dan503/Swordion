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
		<th scope="col" colspan="2" id="agencyResources">Agency Resources</th>
		<th scope="col" id="actualAvailableAppropriationFor">Actual available appropriation for<br> 2014&ndash;15<br> $'000</th>
		<th scope="col" id="paymentsMade">Payments made<br> 2014&ndash;15<br> $'000</th>
		<th scope="col" id="balanceRemaining">Balance remaining<br> 2014&ndash;15<br> $'000</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row" colspan="2" headers="agencyResources" id="explanation">Calculation</th>
			<td headers="actualAvailableAppropriationFor explanation">(a)</td>
			<td headers="paymentsMade explanation">(b)</td>
			<td headers="balanceRemaining explanation">(a) - (b)</td>
		</tr>
        <tr>
			<th scope="colgroup" colspan="5" class="table__heading" id="ordinaryAnnualServices">Ordinary Annual Services</th>
		</tr>
		<tr>
			<th scope="row" colspan="2" headers="agencyResources ordinaryAnnualServices" id="priorYearDepartmentalAppropriation">Prior year Departmental appropriation</th>
			<td headers="actualAvailableAppropriationFor ordinaryAnnualServices priorYearDepartmentalAppropriation">23,781</td>
			<td headers="paymentsMade ordinaryAnnualServices priorYearDepartmentalAppropriation">21,392</td>
			<td headers="balanceRemaining ordinaryAnnualServices priorYearDepartmentalAppropriation">2,389</td>
		</tr>
        <tr>
			<th scope="row" colspan="2" headers="agencyResources ordinaryAnnualServices" id="departmentalAppropriation">Departmental appropriation<sup>1</sup></th>
			<td headers="actualAvailableAppropriationFor ordinaryAnnualServices departmentalAppropriation">91,377</td>
			<td headers="paymentsMade ordinaryAnnualServices departmentalAppropriation">81,163</td>
			<td headers="balanceRemaining ordinaryAnnualServices departmentalAppropriation">10,214</td>
		</tr>
  <tr>
			<th scope="row" colspan="2" headers="agencyResources ordinaryAnnualServices" id="departmentalCapitalBudget">Departmental Capital Budget<sup>2</sup></th>
			<td headers="actualAvailableAppropriationFor ordinaryAnnualServices departmentalCapitalBudget">4,095</td>
			<td headers="paymentsMade ordinaryAnnualServices departmentalCapitalBudget">3,613</td>
			<td headers="balanceRemaining ordinaryAnnualServices departmentalCapitalBudget">482</td>
		</tr>
        <tr>
			<th scope="row" colspan="2" headers="agencyResources ordinaryAnnualServices" id="s75Transfers">s75 Transfers</th>
			<td headers="actualAvailableAppropriationFor ordinaryAnnualServices s75Transfers">-</td>
			<td headers="paymentsMade ordinaryAnnualServices s75Transfers">-</td>
			<td headers="balanceRemaining ordinaryAnnualServices s75Transfers">-</td>
		</tr>
         <tr>
			<th scope="row" colspan="2" headers="agencyResources ordinaryAnnualServices" id="s74RelevantAgencyReceipts">s74 Relevant agency receipts</th>
			<td headers="actualAvailableAppropriationFor ordinaryAnnualServices s74RelevantAgencyReceipts">1,306</td>
			<td headers="paymentsMade ordinaryAnnualServices s74RelevantAgencyReceipts">1,306</td>
			<td headers="balanceRemaining ordinaryAnnualServices s74RelevantAgencyReceipts">-</td>
		</tr>
        
        <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources" id="ordinaryAnnualServices_total">Total</th>
			<td headers="budget1 ordinaryAnnualServices_total">120,559</td>
			<td headers="actualExpenses ordinaryAnnualServices_total">107,474</td>
			<td headers="variation ordinaryAnnualServices_total">13,085</td>
		</tr>
   <tr>
			<th scope="colgroup" colspan="5" class="table__heading" id="administeredExpenses">Administered expenses</th>
		</tr>
		<tr>
			<th scope="row" colspan="2" headers="agencyResources administeredExpenses" id="priorYearAdministeredAppropriation">Prior year Administered appropriation</th>
			<td headers="actualAvailableAppropriationFor administeredExpenses priorYearAdministeredAppropriation">39,481</td>
			<td headers="paymentsMade administeredExpenses priorYearAdministeredAppropriation">30,847</td>
			<td headers="balanceRemaining administeredExpenses priorYearAdministeredAppropriation">&nbsp;</td>
		</tr>
   <tr>
			<th scope="row" colspan="2" headers="agencyResources administeredExpenses" id="outcome1">Outcome 1<sup>1</sup></th>
			<td headers="actualAvailableAppropriationFor administeredExpenses outcome1">147,591</td>
			<td headers="paymentsMade administeredExpenses outcome1">117,471</td>
			<td headers="balanceRemaining administeredExpenses outcome1">&nbsp;</td>
		</tr>
   <tr>
			<th scope="row" colspan="2" headers="agencyResources administeredExpenses" id="paymentsNonCorporateEntities">Payments to non-corporate entities<sup>1</sup></th>
			<td headers="actualAvailableAppropriationFor administeredExpenses paymentsNonCorporateEntities">1,350,698</td>
			<td headers="paymentsMade administeredExpenses paymentsNonCorporateEntities">1,349,152</td>
			<td headers="balanceRemaining administeredExpenses paymentsNonCorporateEntities">&nbsp;</td>
		</tr>
        <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources administeredExpenses" id="administeredExpenses_total">Total administered expenses</th>
			<td headers="actualAvailableAppropriationFor administeredExpenses administeredExpenses_total">1,537,770</td>
			<td headers="paymentsMade administeredExpenses administeredExpenses_total">1,497,470</td>
			<td headers="balanceRemaining administeredExpenses administeredExpenses_total">&nbsp;</td>
		</tr>
   <tr class="table__highlightRow">
			<th scope="row" headers="agencyResources administeredExpenses" id="ordinaryAnnualServices_total">Total ordinary annual services</th>
            <td headers="group administeredExpenses ordinaryAnnualServices_total">A</td>
			<td headers="actualAvailableAppropriationFor administeredExpenses ordinaryAnnualServices_total">1,658,329</td>
			<td headers="paymentsMade administeredExpenses ordinaryAnnualServices_total">1,604,944</td>
			<td headers="balanceRemaining administeredExpenses ordinaryAnnualServices_total">&nbsp;</td>
		</tr>
  <tr>
			<th scope="colgroup" colspan="5" class="table__heading" id="departmentalNonOperating">Departmental non-operating</th>
		</tr>
		<tr>
			<th scope="row" colspan="2" headers="agencyResources departmentalNonOperating" id="priorYearDepartmentalAppropriation">Prior year Departmental appropriation</th>
			<td headers="actualAvailableAppropriationFor departmentalNonOperating priorYearDepartmentalAppropriation">638</td>
			<td headers="paymentsMade departmentalNonOperating priorYearDepartmentalAppropriation">638</td>
			<td headers="balanceRemaining departmentalNonOperating priorYearDepartmentalAppropriation">-</td>
		</tr>
        <tr>
			<th scope="row" colspan="2" headers="agencyResources departmentalNonOperating" id="equityInjections">Equity injections<sup>3</sup></th>
			<td headers="actualAvailableAppropriationFor departmentalNonOperating equityInjections">6,400</td>
			<td headers="paymentsMade departmentalNonOperating equityInjections">400</td>
			<td headers="balanceRemaining departmentalNonOperating equityInjections">6,000</td>
		</tr>
         <tr>
			<th scope="row" colspan="2" headers="agencyResources departmentalNonOperating" id="previousYearsPrograms">Previous year's programmes</th>
			<td headers="actualAvailableAppropriationFor departmentalNonOperating previousYearsPrograms">-</td>
			<td headers="paymentsMade departmentalNonOperating previousYearsPrograms">-</td>
			<td headers="balanceRemaining departmentalNonOperating previousYearsPrograms">-</td>
		</tr>
       <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources departmentalNonOperating" id="departmentalNonOperating_total">Total Departmental non-operating expenses</th>
			<td headers="actualAvailableAppropriationFor departmentalNonOperating departmentalNonOperating_total">7,038</td>
			<td headers="paymentsMade departmentalNonOperating departmentalNonOperating_total">1,038</td>
			<td headers="balanceRemaining departmentalNonOperating departmentalNonOperating_total">6,000</td>
		</tr>
        <tr>
			<th scope="colgroup" colspan="5" class="table__heading" id="administeredNonOperating">Administered non-operating</th>
		</tr>
		<tr>
			<th scope="row" colspan="2" headers="agencyResources administeredNonOperating" id="priorYearAdministeredAppropriation">Prior year Departmental appropriation</th>
			<td headers="actualAvailableAppropriationFor administeredNonOperating priorYearAdministeredAppropriation">2,160,555</td>
			<td headers="paymentsMade administeredNonOperating priorYearAdministeredAppropriation">-</td>
			<td headers="balanceRemaining administeredNonOperating priorYearAdministeredAppropriation">-</td>
		</tr>
        <tr>
			<th scope="row" colspan="2" headers="agencyResources administeredNonOperating" id="administeredAssetsLiabilities">Administered assets and liabilities</th>
			<td headers="actualAvailableAppropriationFor administeredNonOperating administeredAssetsLiabilities">3,229,445</td>
			<td headers="paymentsMade administeredNonOperating administeredAssetsLiabilities">4,767,000</td>
			<td headers="balanceRemaining administeredNonOperating administeredAssetsLiabilities">&nbsp;</td>
		</tr>
         <tr>
			<th scope="row" colspan="2" headers="agencyResources administeredNonOperating" id="paymentsNonCorporateEntitiesNonOperating">Payments to non-corporate entities - non-operating<sup>3</sup></th>
			<td headers="actualAvailableAppropriationFor administeredNonOperating paymentsNonCorporateEntitiesNonOperating">50,000</td>
			<td headers="paymentsMade administeredNonOperating paymentsNonCorporateEntitiesNonOperating">50,000</td>
			<td headers="balanceRemaining administeredNonOperating paymentsNonCorporateEntitiesNonOperating">&nbsp;</td>
		</tr>
       <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources administeredNonOperating" id="administeredNonOperating_total">Total administered non-operating expenses</th>
			<td headers="actualAvailableAppropriationFor administeredNonOperating administeredNonOperating_total">5,440,000</td>
			<td headers="paymentsMade administeredNonOperating administeredNonOperating_total">4,817,000</td>
			<td headers="balanceRemaining administeredNonOperating administeredNonOperating_total">&nbsp;</td>
		</tr>
   <tr class="table__highlightRow">
			<th scope="row" headers="agencyResources administeredNonOperating" id="otherServices_total">Total other services</th>
            <td headers="group administeredNonOperating otherServices_total">B</td>
			<td headers="actualAvailableAppropriationFor administeredNonOperating otherServices_total">5,447,038</td>
			<td headers="paymentsMade administeredNonOperating otherServices_total">4,818,038</td>
			<td headers="balanceRemaining administeredNonOperating otherServices_total">&nbsp;</td>
		</tr>
        
         <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources administeredNonOperating" id="availableAnnualAppropriationsPayments_total">Total available annual appropriations and payments</th>
            
			<td headers="actualAvailableAppropriationFor administeredNonOperating availableAnnualAppropriationsPayments_total">7,105,367</td>
			<td headers="paymentsMade administeredNonOperating availableAnnualAppropriationsPayments_total">6,422,982</td>
			<td headers="balanceRemaining administeredNonOperating availableAnnualAppropriationsPayments_total">&nbsp;</td>
		</tr>
 
   <tr>
			<th scope="colgroup" colspan="5" class="table__heading" id="specialAccounts">special accounts</th>
		</tr>
		<tr>
			<th scope="row" colspan="2" headers="agencyResources specialAccounts" id="openingBalance">Opening balance</th>
			<td headers="actualAvailableAppropriationFor specialAccounts openingBalance">-</td>
			<td headers="paymentsMade specialAccounts openingBalance">-</td>
			<td headers="balanceRemaining specialAccounts openingBalance">&nbsp;</td>
		</tr>
        <tr>
			<th scope="row" colspan="2" headers="agencyResources specialAccounts" id="nonAppropriationReceiptsSpecialAccounts">Non-appropriation receipts to special accounts</th>
			<td headers="actualAvailableAppropriationFor specialAccounts nonAppropriationReceiptsSpecialAccounts">133</td>
			<td headers="paymentsMade specialAccounts nonAppropriationReceiptsSpecialAccounts">-</td>
			<td headers="balanceRemaining specialAccounts nonAppropriationReceiptsSpecialAccounts">&nbsp;</td>
		</tr>
 <tr>
			<th scope="row" colspan="2" headers="agencyResources specialAccounts" id="paymentsMade">Payments made</th>
			<td headers="actualAvailableAppropriationFor specialAccounts paymentsMade">-</td>
			<td headers="paymentsMade specialAccounts paymentsMade">(32)</td>
			<td headers="balanceRemaining specialAccounts paymentsMade">&nbsp;</td>
		</tr>
        
          <tr class="table__highlightRow">
			<th scope="row" headers="agencyResources specialAccounts" id="specialAccount_total">Total special account <sup>4</sup></th>
            <td headers="group specialAccounts specialAccount_total">C</td>
			<td headers="actualAvailableAppropriationFor specialAccounts specialAccount_total">133</td>
			<td headers="paymentsMade specialAccounts specialAccount_total">(32)</td>
			<td headers="balanceRemaining specialAccounts specialAccount_total">101</td>
		</tr>
        
         <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources specialAccounts" id="resourcingPayments_total">Total resourcing and payments<br>A+B+C</th>
			<td headers="actualAvailableAppropriationFor specialAccounts resourcingPayments_total">7,105,500</td>
			<td headers="paymentsMade specialAccounts resourcingPayments_total">6,422,950</td>
			<td headers="balanceRemaining specialAccounts resourcingPayments_total">&nbsp;</td>
		</tr>
        <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources specialAccounts" id="lessAppropriations_total">Less appropriations drawn from annual or special appropriations above and credited to special accounts and/or non-corporate entities through annual appropriations</th>
			<td headers="actualAvailableAppropriationFor specialAccounts lessAppropriations_total">(1,400,698)</td>
			<td headers="paymentsMade specialAccounts lessAppropriations_total">(1,399,152)</td>
			<td headers="balanceRemaining specialAccounts lessAppropriations_total">&nbsp;</td>
		</tr>
   <tr class="table__highlightRow">
			<th scope="row" colspan="2" headers="agencyResources specialAccounts" id="net_total">Total net resourcing and payments for Department of Communications</th>
			<td headers="actualAvailableAppropriationFor specialAccounts net_total">5,704,802</td>
			<td headers="paymentsMade specialAccounts net_total">5,023,798</td>
			<td headers="balanceRemaining specialAccounts net_total">&nbsp;</td>
		</tr>
   </table>
   
<ol><li><?php infoTip('Appropriation', 'An authorisation by Parliament to spend monies from the Consolidated Revenue Fund for a particular purpose') ?> 
 Bill (No.1) 2014&ndash;15, Appropriation Bill (No.3) 2014&ndash;15 and Appropriation</li>
   <li>For accounting purposes, this amount has been designated as 'contributions by owners'.</li>
   <li>Appropriation Bill (No.2) 2014&ndash;15 and Appropriation Bill (No.4) 2014&ndash;15.</li>
   <li>This relates to the Australia New Zealand Land Information Special Account. It does not include 'Special Public Money' held in accounts like Other Trust Monies accounts (OTM).</li>
   <li>Amounts presented in this table exclude GST where applicable.</li>
  </ol>

 <?php heading(2); ?>
 
 <table>
 	<thead>
		<tr>
			<th scope="col" id="expenseName">Expense name</th>
			<th scope="col" id="budget1">Budget<sup>1</sup><br> 2014&ndash;15<br> $'000</th>
			<th scope="col" id="actualExpenses">Actual Expenses<br> 2014&ndash;15<br> $'000</th>
			<th scope="col" id="variation">Variation<br> 2014&ndash;15<br> $'000</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row" headers="expenseName" id="explanation">Calculation</th>
			<td headers="budget1 explanation">(a)</td>
			<td headers="actualExpenses explanation">(b)</td>
			<td headers="variation explanation">(a) - (b)</td>
		</tr>
		<tr>
			<th scope="colgroup" colspan="4" class="table__heading" id="programme_1_1">Programme 1.1: Digital Technologies and Communications Services</th>
		</tr>
		<tr>
			<th headers="programme_1_1" scope="colgroup" colspan="4" class="table__subHeading" id="administeredExpenses">Administered expenses</th>
		</tr>
		<tr>
			<th scope="row" headers="expenseName programme_1_1 administeredExpenses" id="ordinaryAnnualservices">Ordinary annual services (Appropriation Bill No. 1)</th>
			<td headers="budget1 programme_1_1 administeredExpenses ordinaryAnnualservices">128,095</td>
			<td headers="actualExpenses programme_1_1 administeredExpenses ordinaryAnnualservices">127,022 </td>
			<td headers="variation programme_1_1 administeredExpenses ordinaryAnnualservices">1,073</td>
		</tr>
  
   <tr>
 <th scope="row" headers="expenseName programme_1_1 administeredExpenses" id="otherServices">Other services (Appropriation Bill No. 2)</th>
 <td headers="budget1 programme_1_1 administeredExpenses otherServices">&ndash;</td>
 <td headers="actualExpenses programme_1_1 administeredExpenses otherServices">&ndash;</td>
 <td headers="variation programme_1_1 administeredExpenses otherServices">&ndash;</td>
   </tr>
   <tr>
 <th scope="row" headers="expenseName programme_1_1 administeredExpenses" id="specialAccounts">special accounts</th>
 <td headers="budget1 programme_1_1 administeredExpenses specialAccounts">36</td>
 <td headers="actualExpenses programme_1_1 administeredExpenses specialAccounts">32</td>
 <td headers="variation programme_1_1 administeredExpenses specialAccounts">&ndash;</td>
   </tr>
   <tr>
 <th scope="row" headers="expenseName programme_1_1 administeredExpenses" id="expensesNotRequiringAppropriationBudget">Expenses not requiring appropriation in the Budget year<sup>2</sup></th>
 <td headers="budget1 programme_1_1 administeredExpenses expensesNotRequiringAppropriationBudget">14,592</td>
 <td headers="actualExpenses programme_1_1 administeredExpenses expensesNotRequiringAppropriationBudget">13,913</td>
 <td headers="variation programme_1_1 administeredExpenses expensesNotRequiringAppropriationBudget">679</td>
   </tr>
   <tr>
   <th headers="programme_1_1" scope="colgroup" colspan="4" class="table__subHeading" id="departmentalExpenses">Departmental expenses</th>
   </tr>
   <tr>
 <th scope="row" headers="expenseName programme_1_1 departmentalExpenses" id="departmentalAppropriation">Departmental appropriation<sup>3</sup></th>
 <td headers="budget1 programme_1_1 departmentalExpenses departmentalAppropriation">91,992</td>
 <td headers="actualExpenses programme_1_1 departmentalExpenses departmentalAppropriation">92,026</td>
 <td headers="variation programme_1_1 departmentalExpenses departmentalAppropriation">(34)</td>
   </tr>
   <tr>
 <th scope="row" headers="expenseName programme_1_1 departmentalExpenses" id="specialAppropriations">Special appropriations</th>
 <td headers="budget1 programme_1_1 departmentalExpenses specialAppropriations">&ndash;</td>
 <td headers="actualExpenses programme_1_1 administeredExpenses specialAppropriations">&ndash;</td>
 <td headers="variation programme_1_1 administeredExpenses specialAppropriations">&ndash;</td>
   </tr>
   <tr>
 <th scope="row" headers="expenseName programme_1_1 departmentalExpenses" id="specialAccounts">special accounts</th>
 <td headers="budget1 programme_1_1 departmentalExpenses specialAccounts">&ndash;</td>
 <td headers="actualExpenses programme_1_1 administeredExpenses specialAccounts">&ndash;</td>
 <td headers="variation programme_1_1 administeredExpenses specialAccounts">&ndash;</td>
   </tr>
   <tr>
 <th scope="row" headers="expenseName programme_1_1 departmentalExpenses" id="expensesNotRequiringAppropriationBudget">Expenses not requiring appropriation in the Budget year<sup>2</sup></th>
 <td headers="budget1 programme_1_1 departmentalExpenses expensesNotRequiringAppropriationBudget">6,105</td>
 <td headers="actualExpenses programme_1_1 departmentalExpenses expensesNotRequiringAppropriationBudget">6,297</td>
 <td headers="variation programme_1_1 departmentalExpenses expensesNotRequiringAppropriationBudget">(192)</td>
   </tr>
		<tr class="table__highlightRow">
			<th scope="row" headers="expenseName programme_1_1" id="programme_1_1_total">Total for Programme 1.1</th>
			<td headers="budget1 programme_1_1 programme_1_1_total">240,820</td>
			<td headers="actualExpenses programme_1_1 programme_1_1_total">239,290</td>
			<td headers="variation programme_1_1 programme_1_1_total">1,526</td>
		</tr>
		<tr>
			<th scope="colgroup" colspan="4" class="table__heading" id="outcome1">Outcome 1 Totals by appropriation type</th>
		</tr>
		<tr>
			<th headers="outcome1" scope="colgroup" colspan="4" class="table__subHeading" id="administeredExpenses_2">Administered expenses</th>
		</tr>
		<tr>
			<th scope="row" headers="expenseName outcome1 administeredExpenses_2" id="ordinaryAnnualservices_2">Ordinary annual services (Appropriation Bill No. 1)</th>
			<td headers="budget1 outcome1 administeredExpenses_2 ordinaryAnnualservices_2">128,095</td>
			<td headers="actualExpenses outcome1 administeredExpenses_2 ordinaryAnnualservices_2">127,022 </td>
			<td headers="variation outcome1 administeredExpenses_2 ordinaryAnnualservices_2">1,073</td>
		</tr>
        <tr>
 <th scope="row" headers="expenseName programme_1_1 administeredExpenses_2" id="specialAccounts">special accounts</th>
 <td headers="budget1 programme_1_1 administeredExpenses_2 specialAccounts">36</td>
 <td headers="actualExpenses programme_1_1 administeredExpenses_2 specialAccounts">32</td>
 <td headers="variation programme_1_1 administeredExpenses_2 specialAccounts">4</td>
   </tr>
  <tr>
 <th scope="row" headers="expenseName programme_1_1 administeredExpenses_2" id="expensesNotRequiringAppropriationBudget">Expenses not requiring appropriation in the Budget year<sup>2</sup></th>
 <td headers="budget1 programme_1_1 administeredExpenses_2 expensesNotRequiringAppropriationBudget">14,592</td>
 <td headers="actualExpenses programme_1_1 administeredExpenses_2 expensesNotRequiringAppropriationBudget">13,913</td>
 <td headers="variation programme_1_1 administeredExpenses_2 expensesNotRequiringAppropriationBudget">679</td>
   </tr>
  <tr>
			<th headers="outcome1" scope="colgroup" colspan="4" class="table__subHeading" id="departmentalExpenses_2">Departmental expenses</th>
		</tr>
        
        <tr>
 <th scope="row" headers="expenseName programme_1_1 departmentalExpenses_2" id="departmentalAppropriation">Departmental appropriation<sup>3</sup></th>
 <td headers="budget1 programme_1_1 departmentalExpenses_2 departmentalAppropriation">91,992</td>
 <td headers="actualExpenses programme_1_1 departmentalExpenses_2 departmentalAppropriation">92,026</td>
 <td headers="variation programme_1_1 departmentalExpenses_2 departmentalAppropriation">(34)</td>
   </tr>
  <tr>
 <th scope="row" headers="expenseName programme_1_1 departmentalExpenses_2" id="expensesNotRequiringAppropriationBudget">Expenses not requiring appropriation in the Budget year<sup>2</sup></th>
 <td headers="budget1 programme_1_1 departmentalExpenses_2 expensesNotRequiringAppropriationBudget">6,105</td>
 <td headers="actualExpenses programme_1_1 departmentalExpenses_2 expensesNotRequiringAppropriationBudget">6,297</td>
 <td headers="variation programme_1_1 departmentalExpenses_2 expensesNotRequiringAppropriationBudget">(192)</td>
   </tr>
		<tr class="table__highlightRow">
			<th scope="row" headers="expenseName outcome1" id="outcome1_total">Total expenses for Outcome 1</th>
			<td headers="budget1 outcome1 outcome1_total">240,820</td>
			<td headers="actualExpenses outcome1 outcome1_total">239,290</td>
			<td headers="variation outcome1 outcome1_total">1,530</td>
		</tr>
   <tr>
	 <td class="table__divider" colspan="4"></td>
   </tr>
	<tr class="table__highlightRow">
		<th scope="row" headers="expenseName outcome1" id="staffingLevel">Average Staffing Level(number)</th>
		<td headers="budget1 staffingLevel">430</td>
		<td headers="actualExpenses staffingLevel">403</td>
		<td headers="variation staffingLevel">27</td>
	</tr>

   </tbody>
   </table>
   
   <ol>
 <li>Full year budget, including any subsequent adjustment made to the 2014&ndash;15 Budget at Additional Estimates and Supplementary Additional Estimates.</li>
   <li>Expenses not requiring appropriation in the Budget year is made up of issuing of indefeasible rights of use, depreciation expense, amortisation expense, exchange rate movements, inventory expense and audit fees.</li>
   <li>Departmental Appropriation combines &lsquo;Ordinary annual services (<em>Appropriation Bills No. 1, 3 &amp; 5</em>)&rsquo; and &lsquo;Revenue from independent sources (s74)&rsquo;.</li>
   </ol>
 <p>Note: Departmental appropriation splits and totals are indicative estimates and may change in the course of the budget year as Government priorities changep.</p>

<p><?php echo fileLink('Download the Excel version', '/2015/downloads/resource-tables.xlsx') ?></p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
