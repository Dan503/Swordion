<?php

function basicForm ($formFields, $settings = []){

$settings = defaultTo($settings, array(
	'submit' => 'Submit',
	'hasWrapper' => false,
	'action' => $GLOBALS['get']['current']['link'],
	'closed' => true,//set if the form is enclosed by form tags or not
	'required' => true,//set if form fields are required by default
));

if ($settings['hasWrapper']){
	echo '
	<div class="basicForm__wrapper">';
}

if ($settings['closed']){
	echo '
	<form class="basicForm" action="'.$settings['action'].'" method="get">';
}

	foreach ($formFields as $item){
		$label = $item['label'];
		$id = idSafe($label);

		$cols = $settings['cols'];

//all of these can be overridden on any individual form field
		$item = defaultTo($item, [
			'placeholder' => '',
			'type' => 'text',
			'value' => '',
			'checked_by_default' => false,
			'required' => $settings['required'],
			'options' => [
				'option 1',
				'option 2',
				'option 3',
			],
		]);

		$requiredStar = $item['required'] ? ' <span class="basicForm__required">*</span>' : '';

		switch ($item['type']){
			case 'select' :
				$default = defaultTo($item['default'], '- Please select one -');
				echo '
				<div class="basicForm__item basicForm__select">
					<label for="'.$id.'" class="basicForm__label">'.$label.$requiredStar.'</label>
					<select id="'.$id.'" class="basicForm__select">
						<option>'.$default.'</option>';

						foreach ($item['options'] as $option) {
							echo '
							<option>'.$option.'</option>';
						}
					echo '
					</select>
				</div>
				';
			break;

			case 'textarea' :
				echo '
				<div class="basicForm__item basicForm__textarea">
					<label for="'.$id.'" class="basicForm__label">'.$label.$requiredStar.'</label>
					<textarea id="'.$id.'" placeholder="'.$item['placeholder'].'" value="'.$item['value'].'" class="basicForm__textinput basicForm__textinput--textarea"></textarea>
				</div>';
			break;

			case 'checkbox' :
				echo '
				<div class="basicForm__item basicForm__checkboxes">
					<fieldset>
						<legend class="basicForm__label basicForm__legend">'.$label.$requiredStar.'</legend>
						<ul id="'.$id.'" class="basicForm__list TK-noDots grid grid--cols-4 grid--wrap grid--noGrowth">';

							$checkedHTML = $item['checked_by_default'] ? ' checked="checked"' : '';

							foreach ($item['options'] as $option) {
								$optionID = idSafe($option);
								echo '
								<li class="basicForm__listItem grid__cell">
									<input type="checkbox" id="'.$optionID.'" name="'.$id.'"'.$checkedHTML.'>
									<label class="basicForm__label basicForm__label--nested" for="'.$optionID.'">'.$option.'</label>
								</li>';
							}

						echo '
						</ul>
					</fieldset>
				</div>';
			break;

			case 'radio' :
				echo '
				<div class="basicForm__item basicForm__radios">
					<fieldset>
						<legend class="basicForm__label basicForm__legend">'.$label.$requiredStar.'</legend>
						<ul id="'.$id.'" class="basicForm__list TK-noDots grid grid--cols-4 grid--wrap grid--noGrowth">';

							foreach ($item['options'] as $option) {
								$optionID = idSafe($option);
								echo '
								<li class="basicForm__listItem grid__cell">
									<input type="radio" id="'.$optionID.'" name="'.$id.'">
									<label class="basicForm__label basicForm__label--nested" for="'.$optionID.'">'.$option.'</label>
								</li>';
							}

						echo '
						</ul>
					</fieldset>
				</div>';
			break;

			default :
				echo '
				<div class="basicForm__item basicForm__textfield">
					<label for="'.$id.'" class="basicForm__label">'.$label.$requiredStar.'</label>
					<input type="'.$item['type'].'" id="'.$id.'" value="'.$item['value'].'" class="basicForm__textinput" placeholder="'.$item['placeholder'].'">
				</div>';
			break;
		}
	}

if ($settings['submit']){
	echo '
		<div class="basicForm__item basicForm__actions">
			<input type="submit" value="'.$settings['submit'].'" class="basicForm__submit btn">
		</div>';
}


if ($settings['closed']){
	echo '
	</form>';
}

if ($settings['hasWrapper']){
	echo '
</div>';
}

}
?>
