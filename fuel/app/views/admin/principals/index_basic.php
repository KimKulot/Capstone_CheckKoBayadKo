<?php 
		if ($current_user->role != 5 && $current_user->role != 10) {
			Response::redirect('/');
		}
 ?>
<h2>Basic Education Programs</h2>
<br>
<?php if ($students): ?>


<table class="table table-striped">
	<thead>
		<tr>
			<th>Program</th>
			<th>Paid</th>
			<th>Unpaid</th>
			<th>Partial payment</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>

			<?php foreach ($programs as $program): ?>
				<?php 
					$paid = 0;
					$unpaid = 0;
					$partial = 0;
				 ?>
			<td><?php echo $program->basic_program_description; ?></td>
			<?php foreach ($students as $student): ?>
			<?php if($program->basic_program_description == $student->program){ ?>
				<?php 
				if($student->down_payment == ($student->tuition_fee + $student->misc)){
					$paid++; 
				}elseif ($student->down_payment == 0) {
					$unpaid++;
				}else{
					$partial++;
				}
				?>
			<?php } ?>
				<?php $total = $paid + $unpaid + $partial; ?>
				<?php endforeach ?>
				<?php if($total != 0){ ?>
					<td><?php echo 100 * $paid / $total . "%"; ?></td>
					<td><?php echo 100 * $unpaid / $total . "%" ?></td>
					<td><?php echo 100 * $partial / $total . "%"; ?></td>
				<?php } ?>
			</tr>
		<?php endforeach; ?>
	 </tbody>
</table>

	

<?php else: ?>
<p>No Students.</p>

<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
