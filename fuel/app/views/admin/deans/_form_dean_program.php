<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		

		<div class="form-group floating-label">
		     <?php echo Form::label('Program', 'program', array('class'=>'control-label')); ?>
		 
		     <?php echo Form::select('program', Input::post('program', isset($student) ? $user->program : ''),$programs, array('class' => 'span6')); ?>
		 
		</div>
		
		<div class="form-group floating-label" style="margin-top:25px">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>

	</fieldset>
<?php echo Form::close(); ?>


					