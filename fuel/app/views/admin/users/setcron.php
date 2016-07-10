<?php
try {
	$email = Email::forge();

	// Set the from address
	$email->from('edzel.abliter@jmc.edu.ph', 'Edzel Abliter');

	// Set the to address
	$email->to('beverly.losoloso@jmc.edu.ph', 'Beverly Losoloso');

	// Set a subject
	$email->subject('This is the subject');

	// Set multiple to addresses

	$email->to(array(
	    'edzel.abliter@jmc.edu.ph',
	    'edzel.abliter@jmc.edu.ph' => 'Edzel Abliter',
	));

	// And set the body.
	$email->body('This is my message');
	Session::set_flash('success', e('Email sent successfully'));
} catch (Exception $e) {
	echo $e.Message();
}
// Create an instance
?>

<h2>Setting Time and Date</h2>
<br>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Time and date of exam', 'program_description', array('class'=>'control-label')); ?>
				
				<?php echo Form::input('program_description', Input::post('program_description', isset($program) ? $program->program_description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Program Description')); ?>

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>
