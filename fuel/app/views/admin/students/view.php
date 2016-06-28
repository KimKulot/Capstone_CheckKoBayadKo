
<h2>Viewing #<?php echo $student->id; ?></h2>
 <h2><?php echo $user->username ?></h2>
<p>
    <strong>Posted: </strong><?php echo date('nS F, Y', $user->created_at) ?> (<?php echo Date::time_ago($user->created_at)?>)
</p>
 
<p><?php echo nl2br($user->username) ?></p>


<p>
	<strong>Course:</strong>
	<?php echo $student->course; ?></p>
<p>
	<strong>User Id:</strong>
	<?php echo $student->user_id; ?></p>
<p>
	<strong>Username:</strong>
	<?php echo $user->username; ?></p>

