<h2>Viewing #<?php echo $accountant->id; ?></h2>

<p>
	<strong>Firstname:</strong>
	<?php echo $accountant->firstname; ?></p>
<p>
	<strong>Middlename:</strong>
	<?php echo $accountant->middlename; ?></p>
<p>
	<strong>Lastname:</strong>
	<?php echo $accountant->lastname; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $accountant->password; ?></p>
<p>
	<strong>Phone no:</strong>
	<?php echo $accountant->phoneno; ?></p>
<p>
	<strong>Role id:</strong>
	<?php echo $accountant->role_id; ?></p>

<?php echo Html::anchor('admin/accountants/edit/'.$accountant->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/accountants', 'Back'); ?>