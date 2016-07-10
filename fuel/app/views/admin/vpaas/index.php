<div class="pull-right">
		<p>
			<?php echo Html::anchor('admin/vpaas/index', 'course', array('class' => 'btn btn-success')); ?>
		</p>
</div>
<h2>Listing Students</h2>
<br>
<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Program</th>
			<th>Tuition Fee</th>
			<th>Misc</th>
			<th>Down Payment</th>
			<th>Ammount per exam</th>
			<th>Balance</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($students as $item): ?>

		<tr>
			<?php foreach ($users as $key): ?>
				<?php if($item->student_id == $key->id){ ?>
					<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename ?></td>
				<?php } ?>
			<?php endforeach ?>
			<td><?php echo $item->course; ?></td>
			<td><?php echo $item->tuition_fee; ?></td>
			<td><?php echo $item->misc; ?></td>
			<td><?php echo $item->down_payment; ?></td>
			<td><?php echo $item->breakdown; ?></td>
			<td><?php echo $item->balance; ?></td>
		</tr>
	
<?php endforeach; ?>	
	 </tbody>
</table>

<?php else: ?>
<p>No Students.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
