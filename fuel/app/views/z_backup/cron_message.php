public function action_cron_message()
	{ 	


		$data['dates'] = DB::select('date_time')->from('accountantcrons')->order_by('id','desc')->limit(1)->as_object()->execute();
		$data['studparents'] = Model_Studparent::find('all');
		$data['users'] = Model_User::find('all');
		$data['students'] = Model_Student::find('all');

		// BEGIN DATE FORMULA
date_default_timezone_set("America/New_York");
	$date_Counter = 7; 
	$diff = 0;

 $arrmessage = array(); 
 foreach ($data['dates'] as $date){
	
	$subdate = 0;
	$currentDate = date('m/d/Y', strtotime("+". $date_Counter. " days"));

	$var_date = trim($date->date_time);
	$tempdate = date('m/d/Y');
	if($var_date < $tempdate)
	{
		
	}else{

		if ($currentDate > $var_date) {
			$date1 = new DateTime($currentDate);
			$date2 = new Datetime($var_date);
			$diff = $date1->diff($date2);
			$subdate = $diff->days;
		}
		$currentDate = date('m/d/Y', strtotime("+". ($date_Counter - $subdate). " days"));

		if ($currentDate == $var_date) {

			 

			  foreach ($data['students'] as $student){
				  foreach ($data['users'] as $user){ 
				 	 if ($student->student_id == $user->id){ 
						 foreach ($data['studparents'] as $studparent){ 
							 if ($studparent->student_id == $student->id){ 
								 foreach ($data['users'] as $use){ 
									 if ($studparent->parent_id == $use->id){ 

										  $total = $student->tuition_fee + $student->misc; 

										  $message = "Parent Name:" . $use->lastname . ", " .  $use->firstname . " " . $use->middlename . 
										" Mobile Number: " . $use->mobile_number . " " . 
										"Hello! The date of exam will be: " . $date->date_time;

										if($student->balance != 0){
											$message .= "Your total payment is: " . $total .
											" Your payment: " . $student->down_payment .
											" Your Outstanding Balance: " . $student->balance ; 
										}
										
									 }
								 } 
							 }
						 } 
						
							  //$total = $student->tuition_fee + $student->misc + $student; 

							
							  $message = "Name:" .  $user->lastname . ", " . $user->firstname. " " . $user->middlename . "Mobile Number: " . $user->mobile_number . 
							"Hello! The date of exam will be: " . $date->date_time ;
							if($student->balance != 0){
								$message .= "Your total payment is: " .$total . 
								"Your payment: " . $student->down_payment . 
								"Your Outstanding Balance: " . $student->balance; 

							}
							array_push($arrmessage, $message); 
				

						 }
					}
			 	} 


		 
			}
		}
 	
}
 echo header('Content-Type: application/json'); 

	 echo json_encode($arrmessage);	


		 $this->template= null;
	}
