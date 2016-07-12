    <div class="pull-right">
		<div class="col-md-12">
		<p>

			<?php echo Html::anchor('admin/users/setcron', 'Setting Cron', array('class' => 'btn btn-primary')); ?>
		</p>
		</div>
	</div>                                                                                                          
	<div class="pull-right">
		<div class="col-md-12">
		<p>

			<?php echo Html::anchor('admin/users/create_student', '+ Student', array('class' => 'btn btn-primary')); ?>
		</p>
		</div>
	</div>

	<div class="pull-right">
		<div class="col-md-12">
		<p>

			<?php echo Html::anchor('admin/users/create_program', '+ College Program', array('class' => 'btn btn-primary')); ?>
		</p>
		</div>
	</div>



<h2>Listing Users</h2>
<br>
<?php if ($users): ?>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>
		<fieldset>
			<div class="form-group">
				<?php $search = ""?>
					<?php echo Form::input('search',  $search, array('class' => 'col-md-4 form-control', 'placeholder'=>'search' )); ?>
					
					<?php echo Html::anchor('admin/users/index_search/'. $search, 'Search', array('class' => 'btn btn-primary')); ?> 
				

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
			<?php if($item->group == 100){ ?>
				<td><?php echo "Admin"; ?></td>
			<?php } ?>
			<td><?php echo $item->role; ?></td>
			<td>
				<?php echo Html::anchor('admin/users/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/users/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/users/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?> 
<p>
	<?php echo Html::anchor('admin/users/create', 'Add new User', array('class' => 'btn btn-primary')); ?>

</p>
 
