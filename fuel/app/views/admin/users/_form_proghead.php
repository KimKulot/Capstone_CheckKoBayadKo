       <?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

					<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username', 'required')); ?>

			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<?php echo Form::label('Firstname', 'firstname', array('class'=>'control-label')); ?>

					<?php echo Form::input('firstname', Input::post('firstname', isset($user) ? $user->firstname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname', 'required')); ?>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<?php echo Form::label('Middlename', 'middlename', array('class'=>'control-label')); ?>

					<?php echo Form::input('middlename', Input::post('middlename', isset($user) ? $user->middlename : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Middlename')); ?>

			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<?php echo Form::label('Lastname', 'lastname', array('class'=>'control-label')); ?>

					<?php echo Form::input('lastname', Input::post('lastname', isset($user) ? $user->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname', 'required')); ?>

			</div>
		</div>
	</div>
		<div class="form-group floating-label ">
			<?php echo Form::label('Mobile number(+63)', 'mobile_number', array('class'=>'control-label')); ?>
				<!-- <input type="text" readonly="readonly" value="+63"> -->
				<?php echo Form::input('mobile_number', Input::post('mobile_number', isset($user) ? $user->mobile_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Mobile number', 'type' => 'text', 'name'=>'phone', 'maxlength'=>'10', 'onkeypress'=>'return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));', 'required')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email', 'type' => 'email', 'required')); ?>

		</div>

		<div class="form-group floating-label">

			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php
					if(isset($user->password)){ 
						$user->password = null; 
					}
				?>
				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'type' => 'password', 'placeholder'=>'Password', 'id'=>'password', 'required')); ?>

		</div>


		<div class="form-group floating-label">

			<?php echo Form::label('Confirm Password', 'confirm_password', array('class'=>'control-label')); ?>

				<?php echo Form::input('confirm_password', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Confirm Password', 'type' => 'password', 'id'=>'confirm_password', 'required')); ?>
		</div>

		
		<div class="form-group">
		    <div class="col-sm-4">
				<div class="form-group floating-label">
				     <?php echo Form::label('Program', 'program', array('class'=>'control-label')); ?>
				 
				     <?php echo Form::select('program_id', Input::post('program', isset($student) ? $user->program : ''),$programs, array('class' => 'span6')); ?>
				 
				</div>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : '100'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group', 'type'=>'hidden', 'required')); ?>

		</div>

		
		<div class="form-group">
			<?php echo Form::label('', 'role', array('class'=>'control-label')); ?>

				<?php echo Form::input('role', Input::post('role', isset($user) ? $user->role : '2'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group', 'type'=>'hidden', 'required')); ?>

		</div>

		
		

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>	</div>


		<div class="form-group floating-label">
			<?php echo Form::label('', 'send_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('send_at', Input::post('send_at', isset($user) ? $user->send_at : '0'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sent at' ,'readonly'=>'readonly', 'type'=>'hidden')); ?>

		</div>

	</fieldset>
<?php echo Form::close(); ?>