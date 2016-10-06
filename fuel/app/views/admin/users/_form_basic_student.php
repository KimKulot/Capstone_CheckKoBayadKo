
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="form-group floating-label">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>
				
				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username', 'required' )); ?>

		</div>
		<div class="form-group floating-label">
			<?php echo Form::label('Firstname', 'firstname', array('class'=>'control-label')); ?>

				<?php echo Form::input('firstname', Input::post('firstname', isset($user) ? $user->firstname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname', 'required' )); ?>

		</div>
		<div class="form-group floating-label">
			<?php echo Form::label('Middlename / Middle Initial', 'middlename', array('class'=>'control-label')); ?>

				<?php echo Form::input('middlename', Input::post('middlename', isset($user) ? $user->middlename : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Middlename', 'required')); ?>

		</div>
		<div class="form-group floating-label">
			<?php echo Form::label('Lastname', 'lastname', array('class'=>'control-label')); ?>

				<?php echo Form::input('lastname', Input::post('lastname', isset($user) ? $user->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname', 'required')); ?>

		</div>
		<div class="form-group floating-label">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>
				<?php
					if(isset($user->password)){ 
						$user->password = null; 
					}
				?>
				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'type' => 'password', 'placeholder'=>'Password', 'required')); ?>

		</div>
		<div class="form-group floating-label">
			<?php echo Form::label('Mobile number(+63)', 'mobile_number', array('class'=>'control-label')); ?>
				<!-- <input type="text" readonly="readonly" value="+63"> -->
				<?php echo Form::input('mobile_number', Input::post('mobile_number', isset($user) ? $user->mobile_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Mobile number', 'type' => 'text', 'name'=>'phone', 'maxlength'=>'10', 'onkeypress'=>'return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));', 'required')); ?>

		</div>


		<div class="form-group floating-label">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email', 'required')); ?>

		</div>

		<div class="form-group floating-label">
			<?php echo Form::label('', 'role', array('class'=>'control-label')); ?>

				<?php echo Form::input('role', Input::post('role', isset($user) ? $user->role : '8'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Role', 'type'=>'hidden')); ?>

		</div>
		
		<!-- <div class="form-group floating-label">
			<?php echo Form::label('User ID', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($student) ? $user->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'user ID')); ?>
		</div> -->


		

		<div class="form-group floating-label">
		     <?php echo Form::label('Basic Program', 'year', array('class'=>'control-label')); ?>
		 
		     <?php echo Form::select('year', Input::post('year', isset($student) ? $user->year : ''),$basicprograms, array('class' => 'span6')); ?>
		 
		</div>
		<?php $scholarshipss = Model_Scholarship::find('all'); ?>
		<?php $arrscholarship = array(); ?>
		<?php foreach($scholarshipss as $schol => $value){
			$temparray = array($schol => $value->scholarship);
			array_push($arrscholarship, $temparray);
		} 
		
			//print_r($arrscholarship);
		?>  
		
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group floating-label">
				    <?php echo Form::label('Scholarship Provider', 'scholarships', array('class'=>'control-label')); ?>
				   

					<?php echo Form::select('scholarships', Input::post('scholarships', isset($student) ? $user->scholarships : ''),$arrscholarship, array('class' => 'span6')); ?>
				</div>
			</div>
		</div>


		<!-- <div class="form-group floating-label">
		    // <?php //echo Form::label('Program', 'year', array('class'=>'control-label')); ?>
		 	<?php 
			 	// echo Form::select('year', Input::post('year', isset($student) ? $user->year : 'First Year'), array(
				 //    'Highschool' => array(
				 //    	'First Year' => 'First Year',
				 //    	'Second Year' => 'Second Year',
				 //    	'Third Year' => 'Third Year',
				 //    	'Fourth Year' => 'Fourth Year',
				 //    ),
				 //    'Gradeschool' => array(
				 //    	'Grade one' => 'Grade one',
				 //    	'Grade two' => 'Grade two',
				 //    	'Grade three' => 'Grade three',
				 //    	'Grade four' => 'Grade four',
				 //    	'Grade five' => 'Grade five',
				 //    	'Grade six' => 'Grade six',
				 //    ),
				 //   	'Preschool' => 'Preschool',
				 //   	'Kinder one'   => 'Kinder one',
				 //   	'Kinder two'   => 'Kinder two',
				//));
			?>
		    <!-- <div class="input">
		        <?php //echo Form::select('student_id', Input::post('student_id', isset($student) ? $student->student_id : $current_user->id), $students, array('class' => 'span6')); ?>
		 
		    </div> -->
		<!-- </div> --> 		
		
		    <!-- <div class="input">
		        <?php //echo Form::select('student_id', Input::post('student_id', isset($student) ? $student->student_id : $current_user->id), $students, array('class' => 'span6')); ?>
		 
		    </div> -->
		<!-- </div>
		 -->




		<div class="form-group floating-label">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
		
		<div class="form-group floating-label">
			<?php echo Form::label('', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : '1'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group' ,'readonly'=>'readonly', 'type'=>'hidden')); ?>

		</div>
	</fieldset>

<?php echo Form::close(); ?>


<!-- 	<div class="btn-group">
	  <button type="button" class="btn btn-primary">Apple</button>
	  <button type="button" class="btn btn-primary">Samsung</button>
	  <div class="btn-group">
	    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	    Sony <span class="caret"></span></button>
	    <ul class="dropdown-menu" role="menu">
	      <li><a href="#">Tablet</a></li>
	      <li><a href="#">Smartphone</a></li>
	    </ul>
	  </div>
	</div> -->