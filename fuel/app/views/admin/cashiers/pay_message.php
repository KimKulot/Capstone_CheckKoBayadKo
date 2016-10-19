<?php date_default_timezone_set("Asia/Manila"); ?>

<div id="content">
<div class="card contain-sm style-transparent">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-12" style="text-align: left;">
			    <section>
			        <div class="section-body">
			            <div class="card card-bordered style-primary">
			                <div class="card-head">
			                    <header><i class="fa fa-fw fa-tag"></i>Send notification</header>
			                </div>
			                <div class="card-body style-default-bright">
<?php 
	$check = 0;
	$arrnumber = array();
	$arrmessage = array(); 
?>
<?php foreach ($dates as $date): ?>

<?php endforeach ?>
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
									<?php  $message = "Good Day! " . $use->lastname. ", " . $use->firstname . " You have paid: " . $studhistory->down_payment. " pesos " . "(" . date('d/M/y h:i:s') .")";

									if($student->balance != 0):
										$message .= " Good day! Your overall payment is: Php " . $total . " Your downpayment: Php " . $student->down_payment . " Your Balance: Php " . $student->balance . " Thank you!"; 
									endif
									?>
										
									<?php 
										array_push($arrnumber, $use->mobile_number);
										array_push($arrmessage, $message);
									?>
									<!-- END MESSAGE TO BE EXECUTED -->
									<br><br>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>
					<?php endforeach ?>

						

						 <?php $total = $student->tuition_fee + $student->misc; ?>
							
						 <!-- START MESSAGE TO BE EXECUTED -->
						<?php  $messages = "Good Day! " . $user->lastname. ", " . $user->firstname . " You have paid: " . $studhistory->down_payment. " pesos " . "(" . date('d/M/y h:i:s') .")";
							
							if($student->balance != 0){
								$messages .=
								" Your balance: " . $student->balance . " pesos. Thank You!"; 
							}

							array_push($arrnumber, $user->mobile_number);
							array_push($arrmessage, $messages);
						?>
						
				
				<!-- START SEMAPHORE SEND SMS NOTIFICATION -->
				<?php 
					$arrstatus = array();
					$x=0;
				?>
			
					<?php 
					 	foreach($arrnumber as $mynumber)
						{

							/*foreach ($arrmessage as $messages) 
							{*/
								$url = 'http://api.semaphore.co/api/sms';
								 $fields = array(
							        'api' => 'LVpxU61qZzU4pEW2czJc',
							        'number' => $mynumber,
							        'message' => $arrmessage[$x],
							        'status' => ''
							    );
								
								 
								$fields_string = "";
								foreach($fields as $key=>$value)
							    {
							        $fields_string .= $key.'='.$value.'&';
							    }

							    rtrim($fields_string, '&');
								$ch = curl_init();
								// set url
								curl_setopt($ch,CURLOPT_URL, $url);
								curl_setopt($ch,CURLOPT_POST, count($fields));
								curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
								//return the transfer as a string
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
								// $output contains the output  string
								$output = curl_exec($ch);
								// close curl resource to free up system resources
								curl_close($ch);

								$varjson = json_decode($output);
								if ($varjson == null) {
									Session::set_flash('failed', e('Please Check your Internet connection'));
									Response::redirect('admin/cashiers');
								}
								$fields['status'] = $varjson->status;
								array_push($arrstatus, $fields['status']);
								// if status == sucses
									// save

								$resultArray[] = $fields;
								
							/*}*/
							$x++;

						}
					?>
				<!-- END SEMAPHORE SEND SMS NOTIFICATION -->
				<?php 
						
					 $data['messages'] = $resultArray;
					 $this->template->content = View::forge('admin/cashiers/check_message', $data);
					  $this->template= null;

						
					
				// Session::set_flash('success', e('SMS Notification have been sent to students and parent mobile number'));
				
				?> 
					<!-- END SEMAPHORE -->
						<!-- END MESSAGE TO BE EXECUTED -->
						<br><br>
					
						<hr>
					
					<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>
	<?php endforeach ?>
<?php //Response::redirect('admin/cashiers'); ?>

 
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>


				
				
		
