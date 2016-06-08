<h2>Editing Parent</h2>
<br>

<?php echo render('admin/parents/_form'); ?>
<p>
	<?php echo Html::anchor('admin/parents/view/'.$parent->id, 'View'); ?> |
	<?php echo Html::anchor('admin/parents', 'Back'); ?></p>
