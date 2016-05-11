<?php

function drupalForm ($formData){

$settings = defaultTo($formData['settings'], array(
	'submit' => 'Submit',
	'action' => '#',
));

$formFields = $formData['fields'];

echo '
<form class="webform-client-form" enctype="multipart/form-data" action="'.$settings['action'].'" method="post" id="webform-client-form-3" accept-charset="UTF-8" name="webform-client-form-3">
  <div>
    ';

	foreach ($formFields as $item){
		$label = $item['label'];
		$id = idSafe($label);

		$placeholder = defaultTo($item['placeholder'], '');

		switch ($item['type']){
			case 'select' :
				$default = defaultTo($item['default'], 'Please select one');
				echo '
				<div class="form-item form-type-select">
					<label for="'.$id.'">'.$label.'</label>
					<select id="'.$id.'">
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
				<div class="form-item form-type-textfield">
					<label for="'.$id.'">'.$label.'</label>
					<textarea id="'.$id.'" placeholder="'.$placeholder.'"></textarea>
				</div>';
			break;

			case 'checkbox' :
				echo '
				<div class="form-item form-type-checkboxes form-item-tests-taken">
					<label for="'.$id.'">'.$label.'</label>
					<div id="'.$id.'" class="form-checkboxes">';

						foreach ($item['options'] as $option) {
							$optionID = idSafe($option);
							echo '
							<div class="form-item form-type-checkbox form-item-tests-taken-SAT">
								<input type="checkbox" id="'.$optionID.'" class="form-checkbox">
								<label class="option" for="'.$optionID.'">'.$option.'</label>
							</div>';
						}

					echo '
					</div>
				</div>';
			break;

			default :
				echo '
				<div class="form-item form-type-textfield">
					<label for="'.$id.'">'.$label.'</label>
					<input type="text" id="'.$id.'" name="mail" value="" class="form-text" placeholder="'.$placeholder.'">
				</div>';
			break;
		}
	}

	echo '
		<div class="form-actions form-wrapper" id="edit-actions">
			<input type="submit" name="op" value="'.$settings['submit'].'" class="form-submit">
		</div>
	</div>
</form>';

}
?>
