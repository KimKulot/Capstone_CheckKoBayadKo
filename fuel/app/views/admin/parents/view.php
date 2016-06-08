<h2>Viewing #<?php echo $parent->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $parent->parent_id; ?></p>
<p>
	<strong>Parent id:</strong>
	<?php echo $parent->user_id; ?></p>

<?php echo Html::anchor('admin/parents/edit/'.$parent->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/parents', 'Back'); ?>