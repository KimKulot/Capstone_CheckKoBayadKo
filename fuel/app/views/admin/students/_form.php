<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Editing User</li>
                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group floating-label">
			<?php echo Form::label('Course', 'program', array('class'=>'control-label')); ?>

				<?php echo Form::input('program', Input::post('program', isset($student) ? $student->program : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Course')); ?>
		</div>
		<div class="form-group floating-label">
			<?php echo Form::label('Student ID', 'student_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('student_id', Input::post('student_id', isset($student) ? $student->student_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Student ID', 'readonly'=>'readonly')); ?>
		</div>
		<div class="form-group floating-label">
		    <?php echo Form::label('Year', 'year', array('class'=>'control-label')); ?>

		 	<?php 
			 	echo Form::select('year', Input::post('year', isset($student) ? $student->year : ''), array(
				    'Year' => array( 
				        'I Year' => 'I Year',
				        'II Year' => 'II Year',
				        'III Year' => 'III Year',
				        'IV Year' => 'IV Year',
				        'V Year' => 'V Year',
				    ),
				));
			?>
		</div>
		<div class="form-group floating-label">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary btn-sm')); ?>		
		</div>

	</fieldset>
<?php echo Form::close(); ?>