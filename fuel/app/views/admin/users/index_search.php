
	
<h2>Users</h2>
<br>
<?php if ($users): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Full Name</th>
			<th>Mobile number</th>
			<th>Email</th>
			<th>Role</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
		<fieldset>
			<div class="form-group ">
				<?php $search = ""; ?>
					
					<?php echo Form::input('search',  Input::post('search', isset($user) ? $search : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Search' ));  
					?>
			</div>
			<div class="form-group">
					<?php echo Html::anchor('admin/users/index_search/'. $search, '<span class="glyphicon glyphicon-search"></span> Search', array('class' => 'btn btn-primary btn-sm')); ?> 
			</div>	
		</fieldset>

	
<!-- <input type="submit" name="submit" value="submit" /> -->
	
<?php foreach ($users as $item): ?>		<tr>
	
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->lastname . ', ' . $item->firstname . ' ' . $item->middlename ?></td>
			<td><?php echo $item->mobile_number; ?></td>

			<td><?php echo $item->email; ?></td>

			<?php if($item->group == 100){ ?>
				<td><?php echo "Admin"; ?></td>
			<?php }elseif ($item->group == 1){ ?>
				<td><?php echo "Student"; ?></td>
			<?php }elseif ($item->group == 50){ ?>
				<td><?php echo "Parent"; ?></td>
			<?php } ?>
	
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

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/users/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
 -->
 
