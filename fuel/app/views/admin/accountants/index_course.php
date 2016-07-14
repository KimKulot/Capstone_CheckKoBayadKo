<?php 
		if ($current_user->role != 3 && $current_user->role != 10) 
		{
			Response::redirect('/');
		}
 ?>
<div class="pull-right">
		<div class="col-md-12">
		<p>

			<?php echo Html::anchor('admin/accountants/index_student', 'Basic Education', array('class' => 'btn btn-primary')); ?>
		</p>
		</div>
</div>


<h2>College Statistical Report</h2>
<br>
<?php if ($students): ?>

<td>
<?php date_default_timezone_set("America/New_York"); ?>
<h3><?php echo  "The time and date is " . date('Y-m-d') . " " . date("h:i:sa");?></td></h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Program</th>
			<th>Paid</th>
			<th>Unpaid</th>
			<th>Partially paid</th>
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
			<td><?php echo $program->program_description; ?></td>
			<?php foreach ($students as $student): ?>
			<?php if($program->program_description == $student->course){ ?>
				<?php 
				if($student->down_payment == ($student->tuition_fee + $student->misc)){
					$paid++; 
				}elseif ($student->down_payment == 0) {
					$unpaid++;
				}else{
					$partial++;
				}
				?>
			<?php } 
				?>
			
			<?php endforeach ?>
			<?php $total = $paid + $unpaid + $partial; ?>
				<?php if($total != 0){ ?>
					<td><?php echo 100 * $paid / $total . "%"; ?></td>
					<td><?php echo 100 * $unpaid / $total . "%" ?></td>
					<td><?php echo 100 * $partial / $total . "%"; ?></td>
					<!--<td> <?php //echo Html::anchor('admin/admins/view/'.$program->program_description, 'Program'); ?> <!--</td>-->
					
					
						
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
