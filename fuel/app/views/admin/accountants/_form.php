<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($accountant) ? $accountant->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Firstname', 'firstname', array('class'=>'control-label')); ?>

				<?php echo Form::input('firstname', Input::post('firstname', isset($accountant) ? $accountant->firstname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Middlename', 'middlename', array('class'=>'control-label')); ?>

				<?php echo Form::input('middlename', Input::post('middlename', isset($accountant) ? $accountant->middlename : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Middlename')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lastname', 'lastname', array('class'=>'control-label')); ?>

				<?php echo Form::input('lastname', Input::post('lastname', isset($accountant) ? $accountant->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($accountant) ? $accountant->password : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password', 'type'=>'password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($accountant) ? $accountant->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone number', 'phoneno', array('class'=>'control-label')); ?>

				<?php echo Form::input('phoneno', Input::post('phoneno', isset($accountant) ? $accountant->phoneno : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone #')); ?>

		</div>
		<div class="form-group">
		    <?php echo Form::label('User', 'role_id'); ?>
		 
		    <div class="input">
		        <?php echo Form::select('role_id', Input::post('role_id', isset($accountant) ? $accountant->role_id : $current_user->id), $users, array('class' => 'span6')); ?>
		 
		    </div>
		</div>
		
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>