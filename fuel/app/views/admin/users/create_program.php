<h2>New Program</h2>
<br>

<?php echo render('admin/users/_form_program'); ?>


<p><?php echo Html::anchor('admin/users', 'Back'); ?></p>
<h3>Programs Available</h3>
	<?php foreach ($programs as $key): ?>
		<h5><?php echo $key->program_description ?></h5>
	<?php endforeach ?>