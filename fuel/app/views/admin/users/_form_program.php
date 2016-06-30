<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Program Description', 'program_description', array('class'=>'control-label')); ?>
				
				<?php echo Form::input('program_description', Input::post('program_description', isset($program) ? $program->program_description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Program Description')); ?>

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>