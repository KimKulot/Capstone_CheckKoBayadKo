<?php 
		if ($current_user->role != 4 && $current_user->role != 10) {
			Response::redirect('/');
		}
 ?>
<h2>Cashier</h2>
<br>
<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Program</th>
			<th>Total Amount</th>
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
			<td><?php echo $item->program; ?></td>
			<td><?php echo number_format(($item->tuition_fee + $item->misc + $item->other_fees)) ?></td>
			<td><?php echo number_format($item->tuition_fee); ?></td>
			<td><?php echo number_format($item->misc); ?></td>
			<td><?php echo number_format($item->other_fees); ?></td>
			<td><?php echo number_format($item->down_payment); ?></td>
			<td><?php echo number_format($item->breakdown); ?></td>
			<td><?php echo number_format($item->balance); ?></td>
			<td>
				<?php echo Html::anchor('admin/cashiers/edit/'.$item->id, 'Encode', array('class' => 'btn btn-primary btn-sm')); ?> 
			</td>
		</tr>
			
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Students.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
