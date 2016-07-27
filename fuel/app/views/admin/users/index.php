<div class="animated bounceInRight"> 
<?php 
	if ($current_user->role != 3 && $current_user->role != 10) {
		Response::redirect('/');
	}
?>
	
        <div class="pull-right">
			<div class="col-md-12  btn-sm">
				<p>
					<?php echo Html::anchor('admin/users/setcron', '<span class="glyphicon glyphicon-cog"></span> Setting Cron', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>
		</div>
    <div class="animated bounceInRight"> 
	    <div class="pull-right">
			<div class="col-md-12  btn-sm">
			<p>

				<?php echo Html::anchor('admin/users/create_student', '<span class="glyphicon glyphicon-plus"></span> College Student', array('class' => 'btn ink-reaction btn-primary btn-raised')); ?>
			</p>
			</div>
		</div>
    </div>

    <div class="animated bounceInRight"> 
	    <div class="pull-right">
			<div class="col-md-12  btn-sm">
			<p>

				<?php echo Html::anchor('admin/users/create_basic_student', '<span class="glyphicon glyphicon-plus"></span> Basic Education Student', array('class' => 'btn ink-reaction btn-primary btn-raised')); ?>
			</p>
			</div>
		</div>
    </div>                                     

	    <div class="pull-right">
			<div class="col-md-12  btn-sm">
			<p>

				<?php echo Html::anchor('admin/users/create_program', '<span class="glyphicon glyphicon-plus"></span> College Program', array('class' => 'btn btn-primary')); ?>
			</p>
			</div>
		</div>
	
	<div class=" animated bounceInRight"> 
	    <div class="pull-right">
			<div class="col-md-12  btn-sm">
			<p>
				
				<?php echo Html::anchor('admin/users/create_dean', '<span class="glyphicon glyphicon-plus"></span> Dean', array('class' => 'btn btn-primary')); ?>
			</p>
			</div>
		</div>
    </div>
	



<h2>Listing of Users</h2>
<br>
<?php if ($users): ?>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>
		<fieldset>
			<div class="form-group">
				<?php 
				$search=null;
				?>
					
					<?php echo Form::input('search',  Input::post('search', isset($user) ? $search : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Search' ));  
					?>

					<?php echo Html::anchor('admin/users/index_search/'. $search, '<span class="glyphicon glyphicon-search"></span> Search', array('class' => 'btn btn-primary')); ?> 
				

			</div>
			</div>	
			
		</fieldset>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	
<!-- <input type="submit" name="submit" value="submit" /> -->
				
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Full Name</th>
			<th>Phone number</th>
			<th>Email</th>
			<th>Role</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
	<!-- 
	<form class="form-inline">
		<div class="form-group">
			<label class="sr-only">Email</label>
			<p class="form-control-static">email@example.com</p>
		</div>
		<div class="form-group">
			<label for="inputPassword2" class="sr-only">Password</label>
			<input type="password" class="form-control" id="inputPassword2" placeholder="Password">
		</div>
		<button type="submit" class="btn btn-default">Confirm identity</button>
	</form> -->

			<!-- <input type="text" class="form-control" placeholder=".col-xs-3"> -->
	
	

<?php foreach ($users as $item): ?>		<tr>
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->lastname . ', ' . $item->firstname . ' ' . $item->middlename ?></td>
			<td><?php echo $item->phone_number; ?></td>
			<td><?php echo $item->email; ?></td> 
			<?php foreach ($roles as $role): ?>
				<?php 
					if ($item->role == $role->id) 
					{
						echo "<td>$role->role_description</td>"; 
					} 
				?>
			<?php endforeach ?>
			<td>
				<?php echo Html::anchor('admin/users/view/'.$item->id, 'View', array('class' => 'btn btn-primary btn-sm')); ?> |

					<?php if ($item->role == 3  || $item->role == 4 ||  $item->role == 5 || $item->role == 6 || $item->role == 7): ?>
						<?php echo Html::anchor('admin/users/edit/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?> |
					<?php endif ?>
					<?php if ($item->role == 1): ?>
						<?php echo Html::anchor('admin/users/edit_dean/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
					<?php endif ?>
					<?php if ($item->role == 8): ?>
						<?php echo Html::anchor('admin/users/edit_student/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
					<?php endif ?>
					<?php if ($item->role == 9): ?>
						<?php echo Html::anchor('admin/users/edit_parent/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?>
					<?php endif ?>	


				<?php echo Html::anchor('admin/users/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger btn-sm' )); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?> 
<p>
	<?php echo Html::anchor('admin/users/create', '<span class="glyphicon glyphicon-plus"></span> New User', array('class' => 'btn btn-primary')); ?>

</p>
 
 </div>