<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Course', 'course', array('class'=>'control-label')); ?>

				<?php echo Form::input('course', Input::post('course', isset($student) ? $student->course : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Course')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Student ID', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($student) ? $student->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Student ID')); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>