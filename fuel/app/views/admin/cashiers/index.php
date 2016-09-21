<?php 
		if ($current_user->role != 4 && $current_user->role != 10 && $current_user->role != 6) {
			Response::redirect('/');
		}
 ?>

<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Cashier</li>
                <?php echo Html::anchor('admin/cashiers/add_miscellanous', '<span class="glyphicon glyphicon-plus "></span>Miscellanous', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>

                </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

				<?php if ($students): ?>
				<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Program</th>
							<th>Total Assessment</th>
							<th>Tuition Fee</th>
							<th>Misc</th>
							<th>Total Payment</th>
							<th>Amount per exam</th>
							<th>Tuition Discount</th>
							<th>Miscellaneous Discount</th>
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
							<td><span>&#8369</span><?php echo " " . number_format((
							$item->tuition_fee + $item->misc) , 2) ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->tuition_fee,2); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->misc,2); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->down_payment,2); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->breakdown,2); ?></td>
							<td><?= ($item->tuition_fee / 100) * ($item->dis_tuition); ?></td>
							<td><?= ($item->misc / 100) * ('0.' . $item->dis_misc); ?></td>
							<td><span>&#8369</span><?php echo " " . number_format($item->balance,2); ?></td>
							
							<td>
								<?php echo Html::anchor('admin/cashiers/view/'.$item->id, 'View', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> 
							</td>
							<?php if ($current_user->role != 6): ?>
								<td>
									<?php echo Html::anchor('admin/cashiers/edit/'.$item->id, 'Encode', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> 
								</td>
							<?php endif ?>
							
						</tr>
							
				<?php endforeach; ?>	</tbody>
				</table>
				</div>

				<?php else: ?>
				<p>No Students.</p>

				<?php endif; ?><!-- <p>
					<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

				</p> -->
				</div>
            </div>
        </div>
    </section>