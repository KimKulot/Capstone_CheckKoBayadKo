<?php 
		if ($current_user->role != 4 && $current_user->role != 10) {
			Response::redirect('/');
		}
 ?>

<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Cashier</li>
                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

				<?php if ($students): ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Program</th>
							<th>Total Assessment</th>
							<th>Tuition Fee</th>
							<th>Misc</th>
							<th>Other Fees</th>
							<th>Total Payment</th>
							<th>Amount per exam</th>
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
							<td><?php echo number_format((
							$item->tuition_fee + $item->misc + $item->other_fees)) ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->tuition_fee); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->misc); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->other_fees); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->down_payment); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->breakdown); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->balance); ?></td>
							<td>
								<?php echo Html::anchor('admin/cashiers/view/'.$item->id, 'View', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> 
							</td>
							<td>
								<?php echo Html::anchor('admin/cashiers/edit/'.$item->id, 'Encode', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> 
							</td>
						</tr>
							
				<?php endforeach; ?>	</tbody>
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