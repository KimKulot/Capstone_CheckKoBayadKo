<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">
					<?php 
						$mobile_number = ""; 
						$course = ""; 
						$email = ""; 
						$image = ""; 
					?>

                	<?php foreach ($user as $users): ?>
						<?php if($student->student_id == $users->id){ ?>
							
							<?php echo ucwords($users->firstname . " " . $users->middlename . ", " . $users->lastname); ?>
								<!-- <?php var_dump($users->image); ?> -->
							<?php $mobile_number = $users->mobile_number; ?>
							<?php $course = $student->program; ?>
							<?php $email = $users->email; ?>
							<?php $image = $users->image; ?>
						<?php } ?>

					<?php endforeach ?>
							
				</li>
                
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
					<div class="pull-right">
							<p>
								
								<?php echo Html::anchor('admin/users/create_parent/'. $student->id, '<span class="glyphicon glyphicon-plus"></span> Parents', array('class' => 'btn btn-primary btn-sm' , 'onClick' => 'showPasswordInputBox()')); ?>
								
							</p>
					</div>

					<h2>

						
						<?php if ($image == null){ ?>
						<div class="img-responsive" alt="image" style="width: auto; max-width: 100%; height: auto;">
                        	<?php echo Asset::img('default_icon.png'); ?>
                        </div>
                   		<?php }else{ ?>
                      		<?php echo Asset::img('uploads/'. $image); 
                      	}?>
					</h2>
					

					<p>
						<strong>Course:</strong>
						<?php echo $course; ?></p>
					<!-- <p>
						<strong>User Id:</strong>
						<?php echo $student->student_id; ?></p> -->
					<p>
						<strong>Mobile Number:</strong>
						<?= $mobile_number; ?>
					</p>

					<p>
						<strong>Email:</strong>
						<?= $email; ?>
					</p>
				</div>
			</div>
		</div>
	</section>
</div>


