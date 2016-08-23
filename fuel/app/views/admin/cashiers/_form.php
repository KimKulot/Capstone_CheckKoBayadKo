<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Encoding</li>
            </ol>
        </div>
        <div class="section-body">
            <div class="card">
            	<div class="card-body">
				<?php echo Form::open(array("class"=>"form-horizontal")); ?>
				<h5><?php echo "Totals Assessment: &#8369 " . number_format((
							$student->tuition_fee + $student->misc + $student->other_fees)); ?></h5>
				<h5><?= "Outstanding balance: &#8369 " . number_format($student->balance); ?></h5>
				<h5><?= "Total Payment: &#8369 " . number_format($student->down_payment); ?></h5>
				<hr>
				<!-- BEGIN TUITION FEE -->
				<h5><?php echo Html::anchor('admin/students/edit/'.$student->id, '', array('class' => 'md md-mode-edit gui-icon ink-reaction')); ?><?="Tuition Fee: &#8369 " . number_format($student->tuition_fee);?></h5>

				<div class="form-group floating-label">
							<?php echo Form::label('', 'tuition_fee', array('class'=>'control-label')); ?>

						<?php echo Form::input('tuition_fee', Input::post('tuition_fee', isset($student) ? $student->tuition_fee : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tuition Fee', 'readonly' => 'readonly')); ?>
				</div>
				<!-- END TUITION FEE -->
				
				<!-- BEGIN MISCELLANOUS  -->
				<h5><?php echo Html::anchor('admin/students/edit/'.$student->id, '', array('class' => 'md md-mode-edit gui-icon ink-reaction')); ?><?="Miscellaneous: &#8369 " . number_format($student->misc);?></h5>

				<div class="form-group floating-label">
					<?php echo Form::label('', 'misc', array('class'=>'control-label')); ?>

						<?php echo Form::input('misc', Input::post('misc', isset($student) ? $student->misc : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Miscellaneous', 'readonly' => 'readonly')); ?>
				</div>

				<!-- END MISCELLANOUS  -->

				<!-- BEGIN OTHER FEES -->
				<h5><?php echo Html::anchor('admin/students/edit/'.$student->id, '', array('class' => 'md md-mode-edit gui-icon ink-reaction')); ?><?="Other Fees: &#8369 " . number_format($student->other_fees);?></h5>

				<div class="form-group floating-label">
					<?php echo Form::label('', 'other_fees', array('class'=>'control-label')); ?>

						<?php echo Form::input('other_fees', Input::post('other_fees', isset($student) ? $student->other_fees : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Other Fees', 'readonly' => 'readonly'	)); ?>
				</div>
				<!-- END OTHER FEES -->
				

					<fieldset>
						<div class="form-group floating-label">

						<?php
							$paymentString = "Down Payment";
							if($student->down_payment != 0){
								$paymentString ="Payment";
							} 
						?>

						<?php $student->down_payment = null ?>
							<?php echo Form::label($paymentString, 'down_payment', array('class'=>'control-label')); ?>
								
								<?php echo Form::input('down_payment', Input::post('down_payment', isset($student) ? $student->down_payment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=> $paymentString)); ?>
						</div>

					 	<div class="form-group floating-label">
							<label class='control-label'>&nbsp;</label>
							<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary btn-sm')); ?>		
						</div>
						<?php echo Html::anchor('admin/cashiers', 'Back'); ?></p>
						
						
												
						
						
					
						
						<div class="form-group floating-label">
							<?php echo Form::label('', 'breakdown', array('class'=>'control-label')); ?>

								<?php echo Form::input('breakdown', Input::post('breakdown', isset($student) ? $student->breakdown : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Breakdown', 
								'type'=>'hidden')); ?>

						</div>

						<div class="form-group floating-label">
							<?php echo Form::label('', 'balance', array('class'=>'control-label')); ?>

								<?php echo Form::input('balance', Input::post('balance', isset($student) ? $student->balance : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Balance','type'=>'hidden')); ?>

						</div>
						
						
						<div class="form-group floating-label">
							<?php echo Form::label('', 'student_id', array('class'=>'control-label')); ?>

								<?php echo Form::input('student_id', Input::post('student_id', isset($student) ? $student->student_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Student ID', 'type'=>'hidden')); ?>
						</div>
						<div class="form-group floating-label">
							<?php echo Form::label('', 'program', array('class'=>'control-label')); ?>

								<?php echo Form::input('program', Input::post('program', isset($student) ? $student->program : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Course', 'type'=>'hidden')); ?>
						</div>

						<div class="form-group floating-label">
							<?php echo Form::label('', 'year', array('class'=>'control-label')); ?>

								<?php echo Form::input('year', Input::post('year', isset($student) ? $student->year : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Year', 'type'=>'hidden')); ?>
						</div>


						
					</fieldset>
				<?php echo Form::close(); ?>

				