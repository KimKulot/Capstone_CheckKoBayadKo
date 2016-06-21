<h2>Viewing #<?php echo $student->id; ?></h2>

<p>
	<strong>Course:</strong>
	<?php echo $student->course; ?></p>

<?php echo Html::anchor('admin/students/edit/'.$student->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/students', 'Back'); ?>