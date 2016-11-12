<div id="content">

    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Basic Education Statistical Report</li>
          

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
							<th>Date Time</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>

							<?php foreach ($basicprograms as $program): ?>
								<?php 
									$paid = 0;
									$unpaid = 0;
									$partial = 0;
								 ?>
							<td><?php echo $program->basic_program_description; ?></td>
							<?php foreach ($students as $student): ?>
							<?php if($program->basic_program_description == $student->program){ ?>
								<?php 
								if($student->balance == 0){
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

									<td><?php echo number_format(100 * $paid / $total, 2) . "%"; ?></td>
									<td><?php echo number_format(100 * $unpaid / $total, 2) . "%" ?></td>
									<td><?php echo number_format(100 * $partial / $total, 2) . "%"; ?></td>

									<?php $view ['pros'] = DB::select(DB::expr('MAX(date_time) as lastdate'),'program_description')->from('studhistories')->where('program_description', '=', $program->basic_program_description)->as_object()->execute(); ?>
									<?php foreach ($view ['pros'] as $pro): ?>
										<td><?php echo  $pro->lastdate; ?></td>
									<?php endforeach; ?>
									
									<td> <?php echo Html::anchor('admin/vpaas/view_basic/'.$program->basic_program_description, 'Students Financial Assessment', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> </td>
									
									
										
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
        </div><!--end .section-body -->
    </section>
