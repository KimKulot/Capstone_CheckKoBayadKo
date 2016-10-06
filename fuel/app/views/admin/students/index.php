<?php 
		if ($current_user->role != 3 && $current_user->role != 10 && $current_user->role != 6) {
			Response::redirect('/');
		}
 ?>

<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Students</li>
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
							<th>Year</th>
							<th>Student ID</th>
							
							
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php foreach ($students as $item): ?>
					<?php 
						$boolchecker = true;
						$check = 1;
					?>
					<!-- <?php foreach ($users as $key): ?>
					  <?php if($item->student_id == $key->id){ ?>
					    	<h3><?php// echo Html::anchor('admin/students/view/'.$key->username, $key->firstname) ?></h3>
					 <?php } ?>
					<?php endforeach; ?> -->

						<tr>
								<?php foreach ($users as $key): ?>
									<?php if($item->student_id == $key->id){ ?>
									<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename ?></td>

								<?php
									$check = 0;
									 }
									if ($check != 1) {
									 	$boolchecker = false;
									 } 
								?>
								<?php endforeach ?>
								<?php if ($boolchecker==false): ?>
								<td><?php echo $item->program; ?></td>
								<td><?php echo $item->year; ?></td>
								<td><?php echo $item->student_id; ?></td>
							
							

								<?php if ($current_user->role != 6): ?>
									<td>
										<?php echo Html::anchor('admin/students/view/'.$item->id, 'View', array('class' => 'btn btn-primary btn-sm ink-reaction ')); ?> 
										<?php echo Html::anchor('admin/students/edit/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm ink-reaction ')); ?> |
										<?php echo Html::anchor('admin/students/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger btn-sm ink-reaction ' )); ?>

									</td>
								<?php endif ?>
							<?php endif ?>
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