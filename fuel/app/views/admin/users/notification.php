<h2>SMS notification</h2>
<br>
<?php $count = 1; ?>
<?php if ($mobile_number): ?>

	<?php foreach ($mobile_number as $number): ?>
		<?php echo $count . ": " . $number->mobile_number . "<br>"; ?>
		<?php $count++; ?>
	<?php endforeach ?>

<?php endif; ?>