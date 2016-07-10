<h2>New Program</h2>
<br>

<?php echo render('admin/users/_form_basic_program'); ?>
<p><?php echo Html::anchor('admin/users', 'Back'); ?></p>
<h3>Programs Available</h3>
	<?php foreach ($basicprograms as $key): ?>
		<h5><?php echo $key->basic_program_description; ?></h5>
	<?php endforeach ?>


