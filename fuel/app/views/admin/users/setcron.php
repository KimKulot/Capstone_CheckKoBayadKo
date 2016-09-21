<div id="content">
	<div class="col-sm-3"></div>
        <div class="col-sm-6" style="text-align: left;">
		    <section>
		        <div class="section-header">
		            <ol class="breadcrumb"> 
		                <li class="active">Setting Time and Date</li>
		            </ol>
		        </div>

		        <div class="section-body">
		            <div class="card">
		            	<div class="card-body">

						<?php echo Form::open(array("class"=>"form-horizontal")); ?>

							<fieldset>

								<div class="form-group floating-label">
									<?php echo Form::label('Time and date of exam', 'date_time', array('class'=>'control-label')); ?>
										
										<?php echo Form::input('date_time', Input::post('date_time', isset($accountantcron) ? $accountantcron->date_time : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date', 'id' => 'datetimepicker', 'required')); ?>
								</div>
								
								<div class="form-group floating-label" style="margin-top:25px">
									<label class='control-label'>&nbsp;</label>
									<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
								</div>

							</fieldset>


						<?php echo Form::close(); ?>

						<!-- CALLING ASSETS -->
						<?php echo Asset::js('jquery.min.js') ?>
						<!-- Include all compiled plugins (below), or include individual files as needed -->
						<?php echo Asset::js('jquery.datetimepicker.full.js') ?>

						<!-- DATE TIME SCRIPT -->
						<script>
							$("#datetimepicker").datetimepicker();
						</script>

							</div>
		            </div>
		        </div><!--end .section-body -->
		    </section>
		</div>
	</div>












<!-- Sending Email -->
<!-- <?php
//try {
	// $email //= Email::forge();

	// Set the from address
	// $email//->from('edzel.abliter@jmc.edu.ph', 'Edzel Abliter');

	// Set the to address
	// $email//->to('beverly.losoloso@jmc.edu.ph', 'Beverly Losoloso');

	// Set a subject
	// $email->subject('This is the subject');

	// Set multiple to addresses

	// $email->to(array(
	    //'edzel.abliter@jmc.edu.ph',
	    //'edzel.abliter@jmc.edu.ph' => 'Edzel Abliter',
	// ));

	// And set the body.
	// $email//->body('Butod ka, ( love you)');
	//Session::set_flash('success', e('Email sent successfully'));
// } //catch (Exception $e) {
	//echo $e.Message();
// }
// Create an instance
?> -->