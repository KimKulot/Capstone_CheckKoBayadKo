


<h2>Viewing #<?php echo $user->id; ?></h2>

<p>
	<strong>Username:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $user->password; ?></p>
<p>
	<strong>Firstname:</strong>
	<?php echo $user->firstname; ?></p>
<p>
	<strong>Middlename:</strong>
	<?php echo $user->middlename; ?></p>
<p>
	<strong>Lastname:</strong>
	<?php echo $user->lastname; ?></p>
<p>
	<strong>Phone number:</strong>
	<?php echo $user->phone_number; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $user->group; ?></p>

<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>

<?php echo Html::anchor('admin/users/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/users', 'Back'); ?>