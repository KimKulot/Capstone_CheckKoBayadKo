<?php 
		if ($current_user->role != 4 && $current_user->role != 10 && $current_user->role != 6) {
			Response::redirect('/');
		}
 


 ?>
<div id="content">

    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
             <?php if ($current_user->role == 4 || $current_user->role == 10): ?>
                <li class="active">Cashier</li>
               <!--  <?php echo Html::anchor('admin/cashiers/add_miscellanous', '<span class="glyphicon glyphicon-plus "></span>Miscellanous', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?> -->

                </ol>
            <?php endif ?>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
					
				<?php if ($students): ?>
					<?php echo Form::open(array("class"=>"form-horizontal", "action" => 'admin/cashiers')); ?>
						<fieldset>
							<div class="form-group ">
								<?php $search = ""; ?>
									
									<?php echo Form::input('search',  Input::post('search', isset($user) ? $search : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Search' ));  
									?>
							</div>
							<!-- <div class="form-group">
									<?php echo Html::anchor('admin/cashiers/'. $search, '<span class="glyphicon glyphicon-search"></span> Search', array('class' => 'btn btn-primary btn-sm')); ?> 
							</div> -->	
						</fieldset>

						<!-- <form action="admin/users/index_search" method="post">
							search <input type="text" name="search" required>
							<input type="submit">
						</form> -->
					<?php echo Form::open(array("class"=>"form-horizontal")); ?>
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
							<th>Tuition Discount</th>
							<th>Miscellaneous Discount</th>
							<th>Balance</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php foreach ($students as $item): ?>
					<?php 
						$boolchecker = true;
						$check = 1;
					?>
						<tr>
							<?php foreach ($users as $key): ?>
								
								<?php if($item->student_id == $key->id){ ?>
									<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename; ?></td>
									
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
								<td><span>&#8369</span><?php echo " " . number_format((
								$item->tuition_fee + $item->misc) , 2) ?></td>
								<td><span>&#8369</span><?php echo " " . number_format($item->tuition_fee,2); ?></td>
								<td><span>&#8369</span><?php echo " " . number_format($item->misc,2); ?></td>
								<td><span>&#8369</span><?php echo " " . number_format($item->down_payment,2); ?></td>
								
								<td><?= $item->dis_tuition; ?></td>
								<td><?= $item->dis_misc; ?></td>
								<td><span>&#8369</span><?php echo " " . number_format($item->balance,2);?></td>
								
								<td>
									<?php echo Html::anchor('admin/cashiers/view/'.$item->student_id, 'View', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> 
								</td>
								<?php if ($current_user->role != 6): ?>
									<td>
										<?php echo Html::anchor('admin/cashiers/edit/'.$item->id, 'Encode', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> 
									</td>
								<?php endif ?>
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