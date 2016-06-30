<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Course', 'course', array('class'=>'control-label')); ?>

				<?php echo Form::input('course', Input::post('course', isset($student) ? $student->course : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Course')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Tuition Fee', 'tuition_fee', array('class'=>'control-label')); ?>

				<?php echo Form::input('tuition_fee', Input::post('tuition_fee', isset($student) ? $student->tuition_fee : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tuition Fee')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Miscellaneous', 'misc', array('class'=>'control-label')); ?>

				<?php echo Form::input('misc', Input::post('misc', isset($student) ? $student->misc : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Miscellaneous')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Down Payment', 'down_payment', array('class'=>'control-label')); ?>

				<?php echo Form::input('down_payment', Input::post('down_payment', isset($student) ? $student->down_payment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Down payment')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Ammount per exam', 'breakdown', array('class'=>'control-label')); ?>

				<?php echo Form::input('breakdown', Input::post('breakdown', isset($student) ? $student->breakdown : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Breakdown')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Balance', 'balance', array('class'=>'control-label')); ?>

				<?php echo Form::input('balance', Input::post('balance', isset($student) ? $student->balance : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Balance')); ?>

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>