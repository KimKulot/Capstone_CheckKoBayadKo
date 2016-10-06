


<?php $check = 0; ?>
<?php foreach ($dates as $date): ?>
	<?php  foreach ($students as $student): ?>
		<?php 
			$data['studhistories'] = DB::select('down_payment')->from('studhistories')->where('studenthistory_id', '=', $student->id)->order_by('id','desc')->limit(1)->as_object()->execute();
			$downpayment = $data['studhistories'];
		?>
		<?php foreach ($data['studhistories'] as $studhistory): ?>
			 <?php foreach ($users as $user): ?>
			 	<?php if ($student->student_id == $user->id): ?>
					<?php foreach ($studparents as $studparent): ?>
						<?php if ($studparent->student_id == $student->id): ?>
							<?php foreach ($users as $use): ?>
								<?php if ($studparent->parent_id == $use->id): ?>
									
									 <?php $total = $student->tuition_fee + $student->misc; ?>

									 <!-- START MESSAGE TO BE EXECUTED -->
									<?php  $message = "
									Parent Name: <u>$use->lastname, $use->firstname $use->middlename</u><br>
									Mobile Number: $use->mobile_number; <br>
									Hello! The date of exam will be $date->date_time <br>";

									if($student->balance != 0):
										$message .= "Good day! Your overall payment is: $total  <br>
										Your downpayment: $student->down_payment; <br>
										Your Balance:  $student->balance" . ". Thank you!"; 
									endif
									?>
										
									<?php echo $message; ?>
									<!-- END MESSAGE TO BE EXECUTED -->
									<br><br>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>
					<?php endforeach ?>

						

						 <?php $total = $student->tuition_fee + $student->misc; ?>
							
						 <!-- START MESSAGE TO BE EXECUTED -->
						<?php  $messages = "Good Day! Name: " . $user->lastname. ", " . $user->firstname . " " . $user->middlename . " You have paid: " . $studhistory->down_payment. " pesos " . "(" . date('d/M/y h:i:s') .")";
							
							if($student->balance != 0){
								$messages .=
								" Your Outstanding balance: &#8369 " . number_format($student->balance) . ". Thank You!"; 
							}
						?>
						<?php $number = ""; ?>

				<?php try{ ?>
				<!-- START SEMAPHORE SEND SMS NOTIFICATION -->
					<?php 
					 	$url = 'http://api.semaphore.co/api/sms';
						 $fields = array(
				            'api' => 'LVpxU61qZzU4pEW2czJc',
				            'number' => $number,
				            'message' => $messages
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
				        
				        //return $result;
					?>
				<!-- END SEMAPHORE SEND SMS NOTIFICATION -->
				<?php 
				Session::set_flash('success', e('SMS Notification have been sent to students and parent mobile number'));
				}catch(exception $e)
				{
					echo $e;
					
					
				}
				?> 
					<!-- END SEMAPHORE -->
						<!-- END MESSAGE TO BE EXECUTED -->
						<br><br>
					
						<hr>
					
					<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>
	<?php endforeach ?>
	<!-- <?php //Response::redirect('admin/cashiers'); ?> -->
<?php endforeach ?>

				
				
		
