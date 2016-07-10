<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Basic Program Description', 'basic_program_description', array('class'=>'control-label')); ?>
				
				<?php echo Form::input('basic_program_description', Input::post('basic_program_description', isset($basicprogram) ? $basicprogram->basic_program_description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Program Description')); ?>

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>