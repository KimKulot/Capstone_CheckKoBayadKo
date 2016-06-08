<h2>Listing users</h2>
<br>
<?php if ($accountants): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Firstname</th>
			<th>Middlename</th>
			<th>Lastname</th>
			<th>Password</th>
			<th>Phoneno</th>
			<th>Role id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>


<h2>Recent Posts</h2>
 




<?php foreach ($accountants as $item): ?>		<tr>

			<td><?php echo $item->firstname; ?></td>
			<td><?php echo $item->middlename; ?></td>
			<td><?php echo $item->lastname; ?></td>
			<td><?php echo $item->password; ?></td>
			<td><?php echo $item->phoneno; ?></td>
			<td><?php echo $item->role_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/accountants/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/accountants/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/accountants/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/accountants/create', 'Add new user', array('class' => 'btn btn-success')); ?>

</p>
