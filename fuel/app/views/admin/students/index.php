<h2>Listing Students</h2>
<br>
<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Rank</th>
			<!-- <th>Student ID</th> -->
			<th>Full Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<h2>Recent Posts</h2>
<?php foreach ($students as $item): ?>

	<?php foreach ($users as $key): ?>
	  <?php if($item->student_id == $key->id){ ?>
	    	<h3><?php echo Html::anchor('admin/students/view/'.$key->username, $key->firstname) ?></h3>
	 <?php } ?>
	<?php endforeach; ?>

		<tr>
			<td><?php echo $item->course; ?></td>
			<!-- <td><?php echo $item->student_id; ?></td> -->
			<?php foreach ($users as $key): ?>
				<?php if($item->student_id == $key->id){ ?>
					<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename ?></td>
				<?php } ?>
			<?php endforeach ?>
			<td>
				<?php echo Html::anchor('admin/students/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/students/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/students/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
	
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Students.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
