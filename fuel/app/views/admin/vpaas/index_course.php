<?php 
		if ($current_user->role != 7 && $current_user->role != 10) {
			Response::redirect('/');
		}
 ?>
 <div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">College Statistical Report</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

				<?php if ($students): ?>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Program</th>
							<th>Fully Paid</th>
							<th>Not Paid</th>
							<th>With Partial Payment</th>
							<th>Date And Time</th>
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
							<?php if($program->program_description == $student->program){ ?>
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
									<?php $view ['pros'] = DB::select(DB::expr('MAX(date_time) as lastdate'),'program_description')->from('studhistories')->where('program_description', '=', $program->program_description)->as_object()->execute(); ?>
									<?php foreach ($view ['pros'] as $pro): ?>
										<td><?php echo  $pro->lastdate; ?></td>
									<?php endforeach; ?>
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
				</div>
            </div>
        </div>
    </section>