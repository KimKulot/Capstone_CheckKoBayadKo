
<?php 
date_default_timezone_set("America/New_York");
	// echo date("d/m/y");
	// echo "<br>";
	// echo date("D d M Y");
	// echo "<br>";
	// echo date("h:i:s");
	// echo "<br>";
	// echo date("H:i:s");
	// echo "<br>";
?>
<?php $date_time = date("d/m/y");
	 //$date_time .= date("H:i");
	  echo $date_time;
	   if ("29/07/16"== date("d/m/y", strtotime("+7 days"))) {
	  	echo "<br>atchup";
	  }
	  echo "<br>";
	  foreach ($dates as $date) {
	  	 if(date("d/m/y h:i") <= date($date->date_time, strtotime("-7 days"))){
	  	 	echo "atchup boulevard";
	  	 }
	  }
	 
?>
<br><br>
<?php foreach ($dates as $date): ?>
	<?php echo "Set Exam Date: $date->date_time"; ?>
<?php endforeach ?>
<br><br>
<?php  foreach ($students as $student): ?>
	 <?php foreach ($users as $user): ?>
	 	<?php if ($student->student_id == $user->id): ?>
			<?php foreach ($studparents as $studparent): ?>
				<?php if ($studparent->student_id == $student->id): ?>
					<?php foreach ($users as $use): ?>
						<?php if ($studparent->parent_id == $use->id): ?>

							 <?php $total = $student->tuition_fee + $student->misc + $student->other_fees; ?>

							 <!-- START MESSAGE TO BE EXECUTED -->
							<?php  $message = "
							Parent Name: <u>$use->lastname, $use->firstname $use->middlename</u><br>
							Phone Number: $use->phone_number; <br>
							Hello! The date of exam will be (Date and Time)<br>";

							if($student->balance != 0):
								$message .= "Your total payment is: $total  <br>
								Your payment: $student->down_payment; <br>
								Your Outstanding Balance:  $student->balance "; 
							endif
							?>

							<?php echo $message; ?>
							<!-- END MESSAGE TO BE EXECUTED -->
							<br><br>
						<?php endif ?>
					<?php endforeach ?>
				<?php endif ?>
			<?php endforeach ?>

			

				 <?php $total = $student->tuition_fee + $student->misc + $student->other_fees; ?>

				 <!-- START MESSAGE TO BE EXECUTED -->
				<?php  $message = "
				Name: <u>$user->lastname, $user->firstname $user->middlename</u><br>
				Phone Number: $user->phone_number; <br>
				Hello! The date of exam will be (Date and Time)<br>";
				if($student->balance != 0):
					$message .= "Your total payment is: $total  <br>
					Your payment: $student->down_payment; <br>
					Your Outstanding Balance:  $student->balance "; 
				endif
				?>
				<?php echo $message; ?>
				<!-- END MESSAGE TO BE EXECUTED -->
				<br><br>
	
		
				
		<hr>

			<?php endif ?>
	<?php endforeach ?>
<?php endforeach ?>
				<?php //$number = 09471648249; ?>
				<?php //try{ ?>
				<!-- START SEMAPHORE SEND SMS NOTIFICATION -->
				<?php //$fields = array();
				// $fields["api"] = "LVpxU61qZzU4pEW2czJc";
				// $fields["number"] = $number; //safe use 63
				// $fields["message"] = "testing message";
				// $fields["from"] = "kim" /*$string_from*/;
				// $fields_string = http_build_query($fields);
				// $outbound_endpoint = "http://api.semaphore.co/api/sms";
				// $ch = curl_init();
				// curl_setopt($ch, CURLOPT_URL, $outbound_endpoint);
				// curl_setopt($ch,CURLOPT_POST, count($fields));
				// curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				// $output = curl_exec($ch);
				// curl_close($ch);
				?>
				<!-- END SEMAPHORE SEND SMS NOTIFICATION -->
				<?php 
				// Session::set_flash('success', e('Sended Successfully'));
				// }catch(exception $e)
				// {
				// 	echo $e;
				// }
				?> 
		
