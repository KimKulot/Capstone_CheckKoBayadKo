<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<!-- BEGIN OTHER FEES -->

		<div class="form-group floating-label">
	     <?php echo Form::label('Basic Program', 'basic_program_id', array('class'=>'control-label')); ?>
	 
	     <?php echo Form::select('basic_program_id', Input::post('basic program_id', isset($miscellanou) ? $miscellanou->program_id : ''),$programs, array('class' => 'span6')); ?>
		 
		</div>

		<div class="form-group floating-label">
			<?php echo Form::label('Miscellanous Type', 'type', array('class'=>'control-label')); ?>

				<?php echo Form::input('type', Input::post('type', isset($miscellanou) ? $miscellanou->type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Type', 'required' )); ?>
		</div>

		<fieldset>
			<div class="form-group floating-label">

				<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>
					<?php echo Form::input('amount', Input::post('amount', isset($miscellanou) ? $miscellanou->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=> 'Amount', 'type' => 'number', 'step' => '0.1')); ?>
			</div>

		 	<div class="form-group floating-label">
				<label class='control-label'>&nbsp;</label>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary btn-sm')); ?>		
			</div>
			<?php echo Html::anchor('admin/cashiers', 'Back'); ?></p>
		</fieldset>
<?php echo Form::close(); ?>		
			