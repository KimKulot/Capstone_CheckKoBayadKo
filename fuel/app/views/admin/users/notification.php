<h2>SMS notification</h2>
<br>
<?php $count = 1; ?>
<?php if ($phone_number): ?>

	<?php foreach ($phone_number as $number): ?>
		<?php echo $count . ": " . $number->phone_number . "<br>"; ?>
		<?php $count++; ?>
	<?php endforeach ?>

<?php endif; ?>