<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Students</li>
                <?php echo Html::anchor('admin/vpaas/index', 'course', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

				<?php if ($students): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Program</th>
							<th>Tuition Fee</th>
							<th>Misc</th>
							<th>Down Payment</th>
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
				</div>
            </div>
        </div>
    </section>