
<?php 

// // Create an instance
// $email = Email::forge();

// // Set the from address
// $email->from('beverly.losoloso@jmc.edu.ph', 'Kim');

// // Set the to address
// $email->to('beverly.losoloso@jmc.edu.ph', 'Lowie');

// // Set a subject
// $email->subject('This is the subject');

// // Set multiple to addresses

// // $email->to(array(
// //     'edzel.abliter@jmc.edu.ph',
// //     'edzel.abliter@jmc.edu.ph' => 'With a Name',
// // ));

// // And set the body.
// $email->body('I love HONEYs atchup  asdfasdf(LOve ni abliTer');
// ?>
 <br>
 <br>
 <br>
 <br>
 <br> <?php

// try
// {
//     $email->send();
// }
// catch(\EmailValidationFailedException $e)
// {
//    echo $e;
// }

// catch(\EmailSendingFailedException $e)
// {
// 	   echo $e;
//     // The driver could not send the email
// }







	if (!isset($current_user->role)) {
		Response::redirect('/');
	}
	if ($current_user->role != 3 && $current_user->role != 10 && $current_user->role != 6) {
		Response::redirect('/');
	}
?>

<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Users</li>
                <?php if ($current_user->role != 6): ?>

					<!-- <?php //echo Html::anchor('admin/users/setcron', '<span class="glyphicon glyphicon-cog"></span> Setting Cron', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>

					<?php //echo Html::anchor('admin/users/create_student', '<span class="glyphicon glyphicon-plus"></span> College Student', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>

                	<?php //echo Html::anchor('admin/users/create_basic_student', '<span class="glyphicon glyphicon-plus"></span> Basic Education Student', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>

                	<?php //echo Html::anchor('admin/users/create_program', '<span class="glyphicon glyphicon-plus"></span> College Program', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>

                	<?php //echo Html::anchor('admin/users/create_dean', '<span class="glyphicon glyphicon-plus"></span> Dean', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>  -->

                <?php endif ?>
            </ol>
        </div><!--end .section-header -->
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                <?php if ($users): ?>


				
				

				
					<!-- BEGIN ROLE PROCEED -->
					<?php echo Form::open(array("class"=>"form-horizontal", "action" => 'admin/users')); ?>
							<fieldset>
								<div class="row">

									<div class="col-sm-4">
										<div class="form-group ">
											<?php $search = ""; ?>
												
												<?php echo Form::input('search',  Input::post('search', isset($user) ? $search : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Search' ));  
												?>
										</div>
									</div>

									<div class="col-sm-2">
										<div class="form-group">
											<input type="submit" value="Submit">
										</div>
									</div>
								</div>
								
							</fieldset>

					<?php echo Form::open(array("class"=>"form-horizontal")); ?>

					<!-- BEGIN ROLE PROCEED -->
					<?php echo Form::open(array("class"=>"form-horizontal", "action" => 'admin/users')); ?>
							<fieldset>
								<div class="row">

									<div class="col-sm-3">
										<div class="form-group">
										<?php $user_type = ""; ?>
										    <?php echo Form::label('User type', 'user_type', array('class'=>'control-label')); ?>
										 	<?php 
											 	echo Form::select('user_type', Input::post('user_type', isset($student) ? $user_type : ''), array(
												    'Type' => array( 
												    	'' => 'All',
												        '8' => 'Student',
												        '9' => 'Parent',
												        '1' => 'Dean',
												        '2' => 'Program Head',
												    ),
												));
											?>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<input type="submit" value="Submit">
										</div>
									</div>
								</div>
								
							</fieldset>

					<?php echo Form::open(array("class"=>"form-horizontal")); ?>

				<div class="table-responsive">				
				<table class="table no-margin">
					<thead>
						<tr>
							<th>Username</th>
							<th>Full Name</th>
							<th>Mobile number</th>
							<th>Email</th>
							<th>Action</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

				<?php $role_length = count($roles); ?>

				<?php foreach ($roles as $role): ?>
					<?php $data['filtered_user'] = DB::select('*')->from('users')->where('role', $role->id)->as_object()->execute(); ?>
				<?php endforeach ?>

				

				<?php	
					$collection = \Arr::multisort($users, array(
					    'lastname' => SORT_ASC,
					), true);
					//var_dump($collection);
				?>
				<?php $tmp_user = ""; ?>
				<?php if ($role_length > 1){ ?>

					<?php $tmp_user = $users; ?>

				<?php }else{ ?>
					<?php $tmp_user = $data['filtered_user']; ?>
				<?php } ?>
					<?php foreach ($tmp_user as $item){ ?>

						<tr>
							<td><?php echo $item->username; ?></td>
							<td><?php echo ucwords($item->lastname) . ', ' . ucwords($item->firstname) . ' ' . ucwords($item->middlename) ?></td>
							<td><?php echo $item->mobile_number; ?></td>
							<td><?php echo $item->email; ?></td> 
							
							<?php if ($current_user->role != 6): ?>
								<td>
									<!-- <?php //echo Html::anchor('admin/users/view/'.$item->id, 'View', array('class' => 'btn btn-primary btn-sm')); ?> | -->

										<?php if ($item->role == 3  || $item->role == 4 ||  $item->role == 5 || $item->role == 6 || $item->role == 7): ?>
											<?php echo Html::anchor('admin/users/edit/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?> 
										<?php endif ?>
										<?php if ($item->role == 1): ?>
											<?php echo Html::anchor('admin/users/edit_dean/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
										<?php endif ?>

										<?php if ($item->role == 2): ?>
											<?php echo Html::anchor('admin/users/edit_proghead/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
										<?php endif ?>

										<?php if ($item->role == 8): ?>
											
											<?php $count =0; ?>
											<?php foreach ($students as $student): ?>
												<?php if ($student->student_id == $item->id): ?>
													<?php foreach ($programs as $program): ?>
														<?php if ($count == 0): ?>

															<?php if ($program->basic_program_description == $student->year ){ ?>
															<?php $count++; ?>
																<!-- <?php echo $student->program; ?> -->
																<?php echo Html::anchor('admin/users/edit_basic_student/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
															<?php } ?>
															<?php foreach ($college_programs as $college_program): ?>
																<?php if($college_program->program_description == $student->program){ ?>
																	<?php $count++; ?>
																	<!-- <?php echo $program->basic_program_description . " = " . $student->year; ?> -->
																	<?php echo Html::anchor('admin/users/edit_student/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
																<?php } ?>
															<?php endforeach ?>
															
															
														<?php endif ?>
													<?php endforeach ?>
												<?php endif ?>
											<?php endforeach ?>
											

										<?php endif ?>

										<?php if ($item->role == 9): ?>
											<?php echo Html::anchor('admin/users/edit_parent/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
										<?php endif ?>	
						

									<?php echo Html::anchor('admin/users/delete/'.$item->id, 'Deactivate', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger btn-sm' )); ?>


								</td>
							<?php endif ?>
						</tr>
				<?php } ?>	</tbody>
				</table>
				</div>
				<?php else: ?>
				<p>No Users.</p>

				<?php endif; ?> 
				<p>
				<?php if ($current_user->role != 6): ?>
					<!-- <?php echo Html::anchor('admin/users/create', '<span class="glyphicon glyphicon-plus"></span> New User', array('class' => 'btn btn-primary btn-sm')); ?>  -->
				<?php endif ?>
				</p>
				 </div>
            </div>
        </div><!--end .section-body -->
    </section>
