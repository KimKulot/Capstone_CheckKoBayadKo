<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('', 'student_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('student_id', Input::post('student_id', isset($student) ? $student->student_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Student ID', 'type'=>'hidden')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('', 'course', array('class'=>'control-label')); ?>

				<?php echo Form::input('course', Input::post('course', isset($student) ? $student->course : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Course', 'type'=>'hidden')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('', 'year', array('class'=>'control-label')); ?>

				<?php echo Form::input('year', Input::post('year', isset($student) ? $student->year : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Year', 'type'=>'hidden')); ?>
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
			<?php echo Form::label('Other Fees', 'other_fees', array('class'=>'control-label')); ?>

				<?php echo Form::input('other_fees', Input::post('other_fees', isset($student) ? $student->other_fees : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Other Fees')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Down Payment', 'down_payment', array('class'=>'control-label')); ?>

				<?php echo Form::input('down_payment', Input::post('down_payment', isset($student) ? $student->down_payment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Down payment')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('', 'breakdown', array('class'=>'control-label')); ?>

				<?php echo Form::input('breakdown', Input::post('breakdown', isset($student) ? $student->breakdown : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Breakdown', 
				'type'=>'hidden')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('', 'balance', array('class'=>'control-label')); ?>

				<?php echo Form::input('balance', Input::post('balance', isset($student) ? $student->balance : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Balance','type'=>'hidden')); ?>

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>