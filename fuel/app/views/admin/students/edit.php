<h2>Editing User</h2>
<br>

<?php echo render('admin/students/_form'); ?>
<p>
	<?php echo Html::anchor('admin/students/view/'.$student->id, 'View'); ?> |
	<?php echo Html::anchor('admin/students', 'Back'); ?></p>
