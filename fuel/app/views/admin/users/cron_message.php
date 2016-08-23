
<br>
<br>
<br>
<?php  
	$date1 = new DateTime('08/16/2013');
	$date2 = new DateTime('08/23/2013');
	$diff = $date1->diff($date2);
	 // or $diff->days
	echo $diff->days;
	echo "<br>";
	
?>
<br>
<br>
<br>
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
<?php $date_time = date("Y/m/d");	
	 //$date_time .= date("H:i");
	  echo $date_time;
	   if ($date_time == date("Y/m/d", strtotime("+7 days"))) {
	  	echo "<br>atchup";
	  }
	  echo "<br>";
	  foreach ($dates as $date) {

	  	 if(date("Y/m/d") >= date($date->date_time, strtotime("-7 days")) || date("Y/m/d") <= date($date->date_time)){
	  	 	echo "atchup boulevard";
	  	 }  
	  }

	  $daters = date("Y/m/d");
	  echo "<br>" . $daters, strtotime('+7 days'). "<br><br>";

	  echo date($date->date_time, strtotime("7 days"));
	 
?>
<br><br>
<?php foreach ($dates as $date): ?>
	<?php echo "Set Exam Date: " . $date->date_time; ?>
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
							Mobile Number: $use->mobile_number; <br>
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
				Mobile Number: $user->mobile_number; <br>
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
				<?php $number = null; ?>
				<?php try{ ?>
				<!-- START SEMAPHORE SEND SMS NOTIFICATION -->
				<?php 
				 	$url = 'http://api.semaphore.co/api/sms';
					 $fields = array(
			            'api' => 'LVpxU61qZzU4pEW2czJc',
			            'number' => $number,
			            'message' => "Hi! your outstanding balance this school year is ('balance')"
			        );

					$fields_string = "";
					foreach($fields as $key=>$value)
			        {
			            $fields_string .= $key.'='.$value.'&';
			        }
			        rtrim($fields_string, '&');

					//open connection
        			$ch = curl_init();

        			//set the url, number of POST vars, POST data
			        curl_setopt($ch,CURLOPT_URL, $url);
			        curl_setopt($ch,CURLOPT_POST, count($fields));
			        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

					 //execute post
       				 $result = curl_exec($ch);
					
					//close connection
			        curl_close($ch);
			        return $result;
				?>
				<!-- END SEMAPHORE SEND SMS NOTIFICATION -->
				<?php 
				Session::set_flash('success', e('Sended Successfully'));
				}catch(exception $e)
				{
					echo $e;
				}
				?> 
		
