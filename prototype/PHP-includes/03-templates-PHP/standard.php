<?php
	include $head;
?>

<?php

$style = 'deep';

echo '<br><br><b>final output of link: <a href="'.(get('prev','link',$style)).'">Previous</a> <a href="'.(get('next', 'link',$style)).'">Next</a></b><br><br>';

var_dump(get('prev', 'link', $style));

echo '<br><br>';

var_dump(get('next', 'link', $style));

echo '<br><br>';

//var_dump(get(['overview'], 'link'));

var_dump(get(['example shortcut'],'link'));

?>
<?php
    //[1,1,0,3]
    //?location=1-1-0-3
 ?>

	<article class="standardContent">

			<h1><?php echo $get['current']['title']; ?></h1>

			<h2>Uberiora certe sunt - H2</h2>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Compensabatur, inquit, cum summis doloribus laetitia. Neminem videbis ita laudatum, ut artifex callidus comparandarum voluptatum diceretur. Duo Reges: constructio interrete. At iam decimum annum in spelunca iacet. Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? </p>

<p>Nam, ut sint illa vendibiliora, haec uberiora certe sunt. Hic ambiguo ludimur. Hic ego: Pomponius quidem, inquam, noster iocari videtur, et fortasse suo iure. Zenonis est, inquam, hoc Stoici. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Idemne potest esse dies saepius, qui semel fuit? Hoc sic expositum dissimile est superiori. Et non ex maxima parte de tota iudicabis? Itaque sensibus rationem adiunxit et ratione effecta sensus non reliquit. </p>

<ul>
	<li>Est tamen ea secundum naturam multoque nos ad se expetendam magis hortatur quam superiora omnia.</li>
	<li>Quamquam haec quidem praeposita recte et reiecta dicere licebit.
		<ul>
			<li>summum pecudis bonum et hominis</li>
			<li>dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur
				<ul>
					<li>Quod cum ille dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur? Summum ením bonum exposuit</li>
					<li>Quod cum ille dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur? Summum ením bonum exposuit</li>
					<li>Quod cum ille dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur? Summum ením bonum exposuit</li>
				</ul>
			</li>
			<li>Nummus in Croesi divitiis obscuratur, pars est tamen divitiarum. Apparet statim, quae sint officia, quae actiones. Suo genere perveniant ad extremum;</li>
		</ul>
	</li>
	<li>Quid ad utilitatem tantae pecuniae?</li>
	<li>Nec tamen ullo modo summum pecudis bonum et hominis idem mihi videri potest.</li>
	<li>Scaevola tribunus plebis ferret ad plebem vellentne de ea re quaeri.</li>
</ul>

<h3>An haec ab eo non dicuntur - H3</h3>

<p>Sed eum qui audiebant, quoad poterant, defendebant sententiam suam. At quanta conantur! Mundum hunc omnem oppidum esse nostrum! Incendi igitur eos, qui audiunt, vides. Ita fit cum gravior, tum etiam splendidior oratio. Nummus in Croesi divitiis obscuratur, pars est tamen divitiarum. Apparet statim, quae sint officia, quae actiones. Suo genere perveniant ad extremum; Quod cum ille dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur? Summum ením bonum exposuit vacuitatem doloris; Quantum Aristoxeni ingenium consumptum videmus in musicis? De ingenio eius in his disputationibus, non de moribus quaeritur. Habent enim et bene longam et satis litigiosam disputationem. </p>

<ol>
	<li>Est tamen ea secundum naturam multoque nos ad se expetendam magis hortatur quam superiora omnia.</li>
	<li>Quamquam haec quidem praeposita recte et reiecta dicere licebit.
		<ol>
			<li>summum pecudis bonum et hominis</li>
			<li>dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur
				<ol>
					<li>Quod cum ille dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur? Summum ením bonum exposuit</li>
					<li>Quod cum ille dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur? Summum ením bonum exposuit</li>
					<li>Quod cum ille dixisset et satis disputatum videretur, in oppidum ad Pomponium perreximus omnes. An haec ab eo non dicuntur? Summum ením bonum exposuit</li>
				</ol>
			</li>
			<li>Nummus in Croesi divitiis obscuratur, pars est tamen divitiarum. Apparet statim, quae sint officia, quae actiones. Suo genere perveniant ad extremum;</li>
		</ol>
	</li>
	<li>Quid ad utilitatem tantae pecuniae?</li>
	<li>Nec tamen ullo modo summum pecudis bonum et hominis idem mihi videri potest.</li>
	<li>Scaevola tribunus plebis ferret ad plebem vellentne de ea re quaeri.</li>
</ol>

<h4>Quoad poterant - H4</h4>

<p>Quae cum magnifice primo dici viderentur, considerata minus probabantur. Respondent extrema primis, media utrisque, omnia omnibus. Praeteritis, inquit, gaudeo. Quae cum praeponunt, ut sit aliqua rerum selectio, naturam videntur sequi; Sin kakan malitiam dixisses, ad aliud nos unum certum vitium consuetudo Latina traduceret. Beatus autem esse in maximarum rerum timore nemo potest. Sed haec nihil sane ad rem; At, si voluptas esset bonum, desideraret. Graece donan, Latine voluptatem vocant. Qua ex cognitione facilior facta est investigatio rerum occultissimarum. </p>

<ol>
	<li>Atque hoc loco similitudines eas, quibus illi uti solent, dissimillimas proferebas.</li>
	<li>Quae fere omnia appellantur uno ingenii nomine, easque virtutes qui habent, ingeniosi vocantur.</li>
	<li>Sin tantum modo ad indicia veteris memoriae cognoscenda, curiosorum.</li>
	<li>Proclivi currit oratio.</li>
</ol>


<p>Qualis ista philosophia est, quae non interitum afferat pravitatis, sed sit contenta mediocritate vitiorum? Est, ut dicis, inquam. Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae. Quem Tiberina descensio festo illo die tanto gaudio affecit, quanto L. Habes, inquam, Cato, formam eorum, de quibus loquor, philosophorum. Eaedem enim utilitates poterunt eas labefactare atque pervertere. </p>

<p>Sic enim censent, oportunitatis esse beate vivere. Haec dicuntur fortasse ieiunius; Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Ita prorsus, inquam; Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Iubet igitur nos Pythius Apollo noscere nosmet ipsos. Videamus animi partes, quarum est conspectus illustrior; Fatebuntur Stoici haec omnia dicta esse praeclare, neque eam causam Zenoni desciscendi fuisse. Quae in controversiam veniunt, de iis, si placet, disseramus. Quis istud, quaeso, nesciebat? </p>

<h2>Accius, malitiae natae sunt - H2</h2>

<p>Non est igitur summum malum dolor. Tenent mordicus. Itaque si aut requietem natura non quaereret aut eam posset alia quadam ratione consequi. Atqui reperies, inquit, in hoc quidem pertinacem; In eo enim positum est id, quod dicimus esse expetendum. Ut placet, inquit, etsi enim illud erat aptius, aequum cuique concedere. </p>

<p>Atqui reperies, inquit, in hoc quidem pertinacem; Sit enim idem caecus, debilis. Quid enim ab antiquis ex eo genere, quod ad disserendum valet, praetermissum est? Ex ea difficultate illae fallaciloquae, ut ait Accius, malitiae natae sunt. Neque enim civitas in seditione beata esse potest nec in discordia dominorum domus; Semper enim ex eo, quod maximas partes continet latissimeque funditur, tota res appellatur. Istam voluptatem perpetuam quis potest praestare sapienti? Summum ením bonum exposuit vacuitatem doloris; Quibus ego vehementer assentior. Explanetur igitur. Nescio quo modo praetervolavit oratio. </p>

<h2>Hoc loco tenere se Triarius - H2</h2>

<p>Quoniam, si dis placet, ab Epicuro loqui discimus. At ille pellit, qui permulcet sensum voluptate. Tum Torquatus: Prorsus, inquit, assentior; Quo tandem modo? At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; Aliter homines, aliter philosophos loqui putas oportere? Te ipsum, dignissimum maioribus tuis, voluptasne induxit, ut adolescentulus eriperes P. </p>


		<blockquote>
			<p>Quantum Aristoxeni ingenium consumptum videmus in musicis? Dolere malum est: in crucem qui agitur, beatus esse non potest. Videamus igitur sententias eorum, tum ad verba redeamus. Piso igitur hoc modo, vir optimus tuique, ut scis, amantissimus. Quid turpius quam sapientis vitam ex insipientium sermone pendere? Tu quidem reddes; Quod cum accidisset ut alter alterum necopinato videremus, surrexit statim. </p>

		<p class="quoteCite">
		&ndash; From Marguerite Dunstan BA,DipAud,MAudSA(CCP)
		Senior Audiologist/ Clinic Manager ihear - Toowoomba</p>
		</blockquote>

			<p>Duo Reges: constructio interrete. Comprehensum, quod cognitum non habet? An eiusdem modi? Illud urgueam, non intellegere eum quid sibi dicendum sit, cum dolorem summum malum esse dixerit. Quid, si etiam iucunda memoria est praeteritorum malorum? Aliena dixit in physicis nec ea ipsa, quae tibi probarentur; Non autem hoc: igitur ne illud quidem.</p>

			<p>Quod autem in homine praestantissimum atque optimum est, id deseruit. Quae cum dixisset paulumque institisset, Quid est? Hoc loco tenere se Triarius non potuit. Quis Aristidem non mortuum diligit? Quia dolori non voluptas contraria est, sed doloris privatio. Ut proverbia non nulla veriora sint quam vestra dogmata. Ne amores quidem sanctos a sapiente alienos esse arbitrantur.</p>

<h3>Respondent extrema primis - H3</h3>

<p>Sic enim censent, oportunitatis esse beate vivere. Haec dicuntur fortasse ieiunius; Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Ita prorsus, inquam; Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Iubet igitur nos Pythius Apollo noscere nosmet ipsos. Videamus animi partes, quarum est conspectus illustrior; Fatebuntur Stoici haec omnia dicta esse praeclare, neque eam causam Zenoni desciscendi fuisse. Quae in controversiam veniunt, de iis, si placet, disseramus. Quis istud, quaeso, nesciebat? </p>

	</article>

