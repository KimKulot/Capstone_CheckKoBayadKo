<div id="content">
<div class="card contain-sm style-transparent">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-12" style="text-align: left;">
    <section>
        <div class="section-body">
            <div class="card card-bordered style-primary">
                <div class="card-head">
                    <header><i class="fa fa-fw fa-tag"></i>Encoding</header>
                </div>
                <div class="card-body style-default-bright">
				<?php echo Form::open(array("class"=>"form-horizontal")); ?>
				<?php $view ['pros'] = DB::select(DB::expr('MAX(date_time) as lastdate'),'program_description')->from('studhistories')->where('studenthistory_id', '=', $student->id)->as_object()->execute(); ?>
				<?php foreach ($view['pros'] as $pro): ?>
					<td><?php echo "As of: " . $pro->lastdate; ?></td>
				<?php endforeach; ?>
				<h5><?php echo "Total Assessment: &#8369 " . number_format((
							$student->tuition_fee + $student->misc), 2); ?></h5>
				<h5><?= "Outstanding balance: &#8369 " . number_format($student->balance, 2); ?></h5>
				<h5><?= "Total Payment: &#8369 " . number_format($student->down_payment, 2); ?></h5>
				<!-- BEGIN LASTDATE -->
				
				<!-- END LASTDATE -->
				<hr>

				<script>
					function showPasswordInputBox()
					{
					  document.getElementById('tuition').style.display="block" ;
					}
					function showPasswordInputBox2()
					{
					  document.getElementById('misc').style.display="block" ;
					}
					function showPasswordInputBox3()
					{
					  document.getElementById('fee').style.display="block" ;
					}
				</script>
				<input type="text" id="passwd" name="password"  style="display:none;" />
				<!-- BEGIN TUITION FEE -->
				<h5><?php echo Html::anchor('#'.$student->id, '', array('class' => 'md md-mode-edit gui-icon ink-reaction', 'onClick' => 'showPasswordInputBox()')); ?><?="Tuition Fee: &#8369 " . number_format($student->tuition_fee, 2);?></h5>

				<div class="form-group floating-label">
							<?php echo Form::label('', 'tuition_fee', array('class'=>'control-label')); ?>

						<?php echo Form::input('tuition_fee', Input::post('tuition_fee', isset($student) ? $student->tuition_fee : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tuition Fee', 'id' => 'tuition', 'style' => 'display:none')); ?>
				</div>
				<!-- END TUITION FEE -->
				
				<!-- BEGIN MISCELLANOUS  -->
				<!-- <h5><?php echo Html::anchor('#'.$student->id, '', array('class' => 'md md-mode-edit gui-icon ink-reaction', 'onClick' => 'showPasswordInputBox2()')); ?><?="Miscellaneous: &#8369 " . number_format($student->misc, 2);?></h5> -->

				<div class="form-group floating-label">
					<?php echo Form::label('', 'misc', array('class'=>'control-label')); ?>

						<?php echo Form::input('misc', Input::post('misc', isset($student) ? $student->misc : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Miscellaneous', 'id' => 'misc', 'style' => 'display:none')); ?>
				</div>

				<!-- END MISCELLANOUS  -->
				
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
								
								<?php echo Form::input('down_payment', Input::post('down_payment', isset($student) ? $student->down_payment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=> $paymentString, 'type' => 'number', 'step' => '0.1')); ?>
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
							<?php echo Form::label('', 'scholarship_id', array('class'=>'control-label')); ?>

								<?php echo Form::input('scholarship_id', Input::post('scholarship_id', isset($student) ? $student->scholarship_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Scholarship', 'type'=>'hidden')); ?>
						</div>
						<div class="form-group floating-label">
							<?php echo Form::label('', 'program', array('class'=>'control-label')); ?>

								<?php echo Form::input('program', Input::post('program', isset($student) ? $student->program : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Course', 'type'=>'hidden')); ?>
						</div>

						<div class="form-group floating-label">
							<?php echo Form::label('', 'dis_tuition', array('class'=>'control-label')); ?>

								<?php echo Form::input('dis_tuition', Input::post('dis_tuition', isset($student) ? $student->dis_tuition : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'tuition', 'type'=>'hidden')); ?>
						</div>
						<div class="form-group floating-label">
							<?php echo Form::label('', 'dis_misc', array('class'=>'control-label')); ?>

								<?php echo Form::input('dis_misc', Input::post('dis_misc', isset($student) ? $student->dis_misc : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Miscellaneous', 'type'=>'hidden')); ?>
						</div>
						<div class="form-group floating-label">
							<?php echo Form::label('', 'year', array('class'=>'control-label')); ?>

								<?php echo Form::input('year', Input::post('year', isset($student) ? $student->year : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Year', 'type'=>'hidden')); ?>
						</div> 
						


						
					</fieldset>
				<?php echo Form::close(); ?>		
		</div>
	</div>
</div>
				