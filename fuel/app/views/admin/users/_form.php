    <?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'type' => 'password', 'placeholder'=>'Password')); ?>

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
			<?php echo Form::label('Mobile number', 'mobile_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('mobile_number', Input::post('mobile_number', isset($user) ? $user->mobile_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Mobile number')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		 <div class="form-group">
			<?php echo Form::label('', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : '100'), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group', 'type'=>'hidden')); ?>

		</div>

		
		<div class="form-group">
		    <?php echo Form::label('Role', 'role', array('class'=>'control-label')); ?>
		 	<?php 
			 	echo Form::select('role', Input::post('role', isset($student) ? $user->role : 'BSIT'), array(
				    'Role' => array( 
				        '2' => 'Program Head',
				        '3' => 'Accountant',
				        '4' => 'Cashier',
				        '5' => 'Principal',
				        '6' => 'Admin',
				        '7' => 'VPAA',
				    ),
				    
				));
			?>
		   
		</div>
		

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>