<?php 
		if ($current_user->role != 3 && $current_user->role != 10) {
			Response::redirect('/');
		}
 ?>


<h2>Listing of Students</h2>
<br>
<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Program</th>
			<th>Year</th>
			<th>Student ID</th>
			<th>Full Name</th>
			<th>Parent Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($students as $item): ?>

	<!-- <?php foreach ($users as $key): ?>
	  <?php if($item->student_id == $key->id){ ?>
	    	<h3><?php// echo Html::anchor('admin/students/view/'.$key->username, $key->firstname) ?></h3>
	 <?php } ?>
	<?php endforeach; ?> -->

		<tr>
			<td><?php echo $item->program; ?></td>
			<td><?php echo $item->year; ?></td>
			<td><?php echo $item->student_id; ?></td>
			
			<?php foreach ($users as $key): ?>
				<?php if($item->student_id == $key->id){ ?>
					<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename ?></td>
			<?php } ?>

				
			<?php endforeach ?>
			<td>
				<?php echo Html::anchor('admin/students/view/'.$item->id, 'View', array('class' => 'btn btn-primary btn-sm')); ?> |
				<?php echo Html::anchor('admin/students/edit/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?> |
				<?php echo Html::anchor('admin/students/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger btn-sm' )); ?>

			</td>
		</tr>
	
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Students.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
