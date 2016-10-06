
<br>
<br>
<br>
<br>
<br>	
<?php 
	$messages = "Sample message"; 
	$number = null;
?>
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