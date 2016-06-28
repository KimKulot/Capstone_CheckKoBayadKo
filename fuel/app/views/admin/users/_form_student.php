<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>
				
				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username' )); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Firstname', 'firstname', array('class'=>'control-label')); ?>

				<?php echo Form::input('firstname', Input::post('firstname', isset($user) ? $user->firstname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Middlename', 'middlename', array('class'=>'control-label')); ?>

				<?php echo Form::input('middlename', Input::post('middlename', isset($user) ? $user->middlename : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Middlename')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lastname', 'lastname', array('class'=>'control-label')); ?>

				<?php echo Form::input('lastname', Input::post('lastname', isset($user) ? $user->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'type' => 'password', 'placeholder'=>'Password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone number', 'phone_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone_number', Input::post('phone_number', isset($user) ? $user->phone_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone number')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		
		<!-- <div class="form-group">
			<?php echo Form::label('User ID', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($student) ? $user->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'user ID')); ?>
		</div> -->
		<div class="form-group">
		    <?php echo Form::label('Rank', 'course', array('class'=>'control-label')); ?>
		 	<?php 
			 	echo Form::select('course', Input::post('course', isset($student) ? $user->course : 'BSIT'), array(
				    'College' => array(
				        'BSIT' => 'BSIT',
				        'BSCS' => 'BSCS',
				        'BSBA' => 'BSBA',
				    ),
				    'Highschool' => array(
				    	'1st Year' => '1st Year',
				    	'2nd Year' => '2nd Year',
				    	'3th Year' => '3th Year',
				    	'4th Year' => '4th Year',
				    ),
				    'Gradeschool' => array(
				    	'Grade 1' => 'Grade 1',
				    	'Grade 2' => 'Grade 2',
				    	'Grade 3' => 'Grade 3',
				    	'Grade 4' => 'Grade 4',
				    	'Grade 5' => 'Grade 5',
				    	'Grade 6' => 'Grade 6',
				    ),
				   	'Preschool' => 'Preschool',
				   	'Kinder 1'   => 'Kinder 1',
				   	'Kinder 2'   => 'Kinder 2',
				));
			?>
		    <!-- <div class="input">
		        <?php echo Form::select('student_id', Input::post('student_id', isset($student) ? $student->student_id : $current_user->id), $students, array('class' => 'span6')); ?>
		 
		    </div> -->
		</div>
		

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
		
		<div class="form-group">
			<?php echo Form::label('', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : '1'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group' ,'readonly'=>'readonly', 'type'=>'hidden')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>