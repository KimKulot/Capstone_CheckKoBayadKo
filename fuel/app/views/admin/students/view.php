<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Student View</li>
                
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
					<div class="pull-right">
							<p>
								<script>
									function showPasswordInputBox()
									{
									  document.getElementById('tuition').style.display="block" ;
									  document.getElementById('misc').style.display="block" ;
									}
								</script>
								<?php echo Html::anchor('#', '<span class="glyphicon glyphicon-plus"></span> Parents', array('class' => 'btn btn-primary btn-sm' , 'onClick' => 'showPasswordInputBox()')); ?>

								<div>

									<?php echo Html::anchor('admin/users/create_exist_parent/'. $student->id, '<span class="glyphicon glyphicon-plus"></span> Exist Parent', array('class' => 'btn btn-primary btn-sm' , 'id' => 'tuition', 'style' => 'display:none')); ?>
								</div>

							
									<?php echo Html::anchor('admin/users/create_parent/'. $student->id, '<span class="glyphicon glyphicon-plus"></span> Not Exist Parent', array('class' => 'btn btn-primary btn-sm' , 'id' => 'misc', 'style' => 'display:none')); ?>

							</p>
					</div>

					<h2>Viewing #<?php echo $student->id; ?></h2>
					 
					<p>
						<strong>Course:</strong>
						<?php echo $student->program; ?></p>
					<p>
						<strong>User Id:</strong>
						<?php echo $student->student_id; ?></p>
					<p>
					<?php foreach ($user as $users): ?>
						<?php if($student->student_id == $users->id){ ?>
							<?php echo $users->username ?>
						<?php } ?>
					<?php endforeach ?>
					</p>
				</div>
			</div>
		</div>
	</section>
</div>


