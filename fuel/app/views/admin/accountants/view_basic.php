<div class="pull-right">
		<p>
			<?php echo Html::anchor('admin/accountants/index_student', 'Basic Education', array('class' => 'btn btn-primary')); ?>
		</p>
</div>
<h2>Listing of Students</h2>
<br><?php if ($basicprograms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Program</th>
			<th>Year</th>
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
	<?php foreach ($basicprograms as $program): ?>
		<?php if ($program->basic_program_description == $item->program): ?>
			<tr>
				<?php foreach ($users as $key): ?>
					<?php if($item->student_id == $key->id){ ?>
						<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename ?></td>
					<?php } ?>
				<?php endforeach ?>
				<td><?php echo $item->program; ?></td>
				<td><?php echo $item->year; ?></td>
				<td><?php echo $item->tuition_fee; ?></td>
				<td><?php echo $item->misc; ?></td>
				<td><?php echo $item->other_fees; ?></td>
				<td><?php echo $item->down_payment; ?></td>
				<td><?php echo $item->breakdown; ?></td>
				<td><?php echo $item->balance; ?></td>
			</tr>
		<?php endif ?>
	<?php endforeach ?>
<?php endforeach; ?>	
	 </tbody>
</table>

<?php else: ?>
<p>No Students.</p>
<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
