    <?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Scholarship Provider', 'scholarship_provider', array('class'=>'control-label')); ?>

				<?php echo Form::input('scholarship_provider', Input::post('scholarship_provider', isset($scholars) ? $scholars->scholarship_provider : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Scholarship Provider')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Category', 'category', array('class'=>'control-label')); ?>

				<?php echo Form::input('category', Input::post('category', isset($scholars) ? $scholars->category : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Category')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($scholars) ? $scholars->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>

		

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>