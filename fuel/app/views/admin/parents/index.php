<h2>Listing parents</h2>
<br>

<?php if ($parents): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Parent id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<h2>Recent Posts</h2>
 
<?php foreach ($parents as $parent): ?>
 
    <h3><?php echo Html::anchor('admin/parents/view/'.$parent->user_id, $parent->parent_id) ?></h3>
    <p><?php echo $parent->parent_id; ?></p>
 
<?php endforeach; ?>


<?php foreach ($parents as $item): ?>		
		<tr>
			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->parent_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/parents/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/parents/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/parents/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Parents.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/parents/create', 'Add new Parent', array('class' => 'btn btn-success')); ?>

</p>
