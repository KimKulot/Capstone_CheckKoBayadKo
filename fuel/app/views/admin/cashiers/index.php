<?php 
		if ($current_user->role != 4 && $current_user->role != 10) {
			Response::redirect('/');
		}
 ?>
<h2>List of Students who paid and not paid</h2>
<br>
<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Program</th>
			<th>Tuition Fee</th>
			<th>Misc</th>
			<th>Other Fees</th>
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
			<td><?php echo $item->other_fees; ?></td>
			<td><?php echo $item->down_payment; ?></td>
			<td><?php echo $item->breakdown; ?></td>
			<td><?php echo $item->balance; ?></td>
			<td>
				<?php echo Html::anchor('admin/cashiers/edit/'.$item->id, 'Encode'); ?> |
			</td>
		</tr>
			
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Students.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
