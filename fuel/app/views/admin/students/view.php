<div class="pull-right">
		<p>

			<?php echo Html::anchor('admin/users/create_parent/'. $student->id, '<span class="glyphicon glyphicon-plus"></span> Parents', array('class' => 'btn btn-primary')); ?>

		</p>
</div>

<h2>Viewing #<?php echo $student->id; ?></h2>
 
<p>
	<strong>Course:</strong>
	<?php echo $student->program; ?></p>
<p>
	<strong>User Id:</strong>
	<?php echo $student->student_id; ?></p>
<p>
<?php foreach ($user as $users): ?>
	<?php if($student->student_id == $users->id){ ?>
		<?php echo $users->username ?>
	<?php } ?>
<?php endforeach ?>

