<h2>Editing User</h2>
<br>

<?php echo render('admin/cashiers/_form'); ?>
<p>
	<?php echo Html::anchor('admin/cashiers/view/'.$student->id, 'View'); ?> |
	<?php echo Html::anchor('admin/cashiers', 'Back'); ?></p>
