<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	
	<fieldset>
		<div class="row">
			<div class="col-sm-6">	
				<div class="form-group">
					<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>
						
						<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username', 'required' )); 
						?>

				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<?php echo Form::label('Firstname', 'firstname', array('class'=>'control-label')); ?>

						<?php echo Form::input('firstname', Input::post('firstname', isset($user) ? $user->firstname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname', 'required' )); ?>

						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group floating-label">
					<?php echo Form::label('Middlename / Middle Initial', 'middlename', array('class'=>'control-label')); ?>

						<?php echo Form::input('middlename', Input::post('middlename', isset($user) ? $user->middlename : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Middlename')); ?>

				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group floating-label">
					<?php echo Form::label('Lastname', 'lastname', array('class'=>'control-label')); ?>

						<?php echo Form::input('lastname', Input::post('lastname', isset($user) ? $user->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname', 'required')); ?>

				</div>
			</div>
		</div>

		<div class="form-group floating-label">

			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php
					if(isset($user->password)){ 
						$user->password = null; 
					}
				?>
				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'type' => 'password', 'placeholder'=>'Password', 'id'=>'password')); ?>

		</div>


		<div class="form-group floating-label">
	
			<?php echo Form::label('Confirm Password', 'confirm_password', array('class'=>'control-label')); ?>
			 <!-- Form::input('name', 'value', array('style' => 'border: 2px;')); -->
				<?php echo Form::input('confirm_password', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Confirm Password', 'type' => 'password', 'id'=>'confirm_password')); ?>
		</div>


		<div class="form-group floating-label ">
			<?php echo Form::label('Mobile number(+63)', 'mobile_number', array('class'=>'control-label')); ?>
				<!-- <input type="text" readonly="readonly" value="+63"> -->
				<?php echo Form::input('mobile_number', Input::post('mobile_number', isset($user) ? $user->mobile_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Mobile number', 'type' => 'text', 'name'=>'phone', 'maxlength'=>'10', 'onkeypress'=>'return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));')); ?>

		</div>

		<br>
		<div class="form-group floating-label">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email', 'required', 'type'=>'email')); ?>
		</div>

<!-- echo Form::label('Male', 'gender');

echo Form::label('Female', 'gender');
echo Form::radio('gender', 'Female'); -->

		<div class="form-group floating-label">
		    <?php echo Form::label('Gender: ', 'gender', array('class'=>'control-label')); ?>
		    <br>
		    
		 	<?php echo Form::radio('gender', 'male', true); ?>
		 	<?php echo Form::label('Male', 'gender'); ?>
			
		 	<?php echo Form::radio('gender', 'female', true); ?>
		 	<?php echo Form::label('Female', 'gender'); ?>
		</div>

		<?php 
			$temp_scholar = ''; 
			$temp_program = '';
			$temp_year = '';
		?>
		<?php if (isset($scholarship)): ?>
			<?php foreach ($scholarship as $scholar) {
				$temp_scholar = $scholar->scholarship_id;
				$temp_program = $scholar->program;
				$temp_year = $scholar->year;
			} ?>
		<?php endif ?>

		<div class="row">
			<div class="col-sm-4">
				<div class="form-group floating-label">
				     <?php echo Form::label('Program', 'program', array('class'=>'control-label')); ?>
				 
				     <?php echo Form::select('program', Input::post('program', isset($student) ? $user->program : $temp_program),$programs, array('class' => 'span6')); ?>
				</div>
				
			</div>

			
			<div class="col-sm-4">
				<div class="form-group floating-label">
				    <?php echo Form::label('Year', 'year', array('class'=>'control-label')); ?>
				 	<?php 
					 	echo Form::select('year', Input::post('year', isset($student) ? $user->year : $temp_year), array(
						    'Year' => array( 
						        'I Year' => 'First',
						        'II Year' => 'Second',
						        'III Year' => 'Third',
						        'IV Year' => 'Fourth',
						        'V Year' => 'Fifth',
						    ),
						));
					?>
				</div>
			</div>
		</div>

		<?php $scholarshipss = Model_Scholarship::find('all'); ?>
		<?php $arrscholarship = array(); ?>
		<?php foreach($scholarshipss as $schol => $value){
			$temparray = array($schol => $value->scholarship);
			array_push($arrscholarship, $temparray);
		} 
		// var_dump($arrscholarship);
			//print_r($arrscholarship);
		?> 


		
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group floating-label">
				    <?php echo Form::label('Scholarship Provider', 'scholarships', array('class'=>'control-label')); ?>
				   

					<?php echo Form::select('scholarships', Input::post('scholarships', isset($student) ? $scholar->scholarship_id : $temp_scholar ),$arrscholarship, array('class' => 'span6')); ?>
				</div>
			</div>
		</div>

		
		<div class="form-group floating-label">
			<?php echo Form::label('', 'role', array('class'=>'control-label')); ?>

				<?php echo Form::input('role', Input::post('role', isset($user) ? $user->role : '8'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Role', 'type'=>'hidden')); ?>

				
		</div>
		
		<!-- <div class="form-group floating-label">
			<?php echo Form::label('User ID', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($student) ? $user->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'user ID')); ?>
		</div> -->


		


		<!-- <div class="form-group floating-label">
		    <?php //echo Form::label('Program', 'course', array('class'=>'control-label')); ?>
		 	<?php 
			 	echo Form::select('course', Input::post('course', isset($student) ? $user->course : 'BSIT'), array(
				    'Highschool' => array(
				    	'First Year' => 'First Year',
				    	'Second Year' => 'Second Year',
				    	'Third Year' => 'Third Year',
				    	'Fourth Year' => 'Fourth Year',
				    ),
				    'Gradeschool' => array(
				    	'Grade one' => 'Grade one',
				    	'Grade two' => 'Grade two',
				    	'Grade three' => 'Grade three',
				    	'Grade four' => 'Grade four',
				    	'Grade five' => 'Grade five',
				    	'Grade six' => 'Grade six',
				    ),
				   	'Preschool' => 'Preschool',
				   	'Kinder one'   => 'Kinder one',
				   	'Kinder two'   => 'Kinder two',
				));
			?>
		    <!-- <div class="input">
		        <?php //echo Form::select('student_id', Input::post('student_id', isset($student) ? $student->student_id : $current_user->id), $students, array('class' => 'span6')); ?>
		 
		    </div> -->
		<!-- </div> -->

		
		




		<div class="form-group floating-label">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
		
		<div class="form-group floating-label">
			<?php echo Form::label('', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : '1'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group' ,'readonly'=>'readonly', 'type'=>'hidden')); ?>

		</div>

		<div class="form-group floating-label">
			<?php echo Form::label('', 'send_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('send_at', Input::post('send_at', isset($user) ? $user->send_at : '0'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sent at' ,'readonly'=>'readonly', 'type'=>'hidden')); ?>

		</div>
	</fieldset>

<?php echo Form::close(); ?>
