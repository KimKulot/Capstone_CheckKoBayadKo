<?php
class Controller_Admin_Cashiers extends Controller_Admin
{
	// public function before()
	// {
	// 	parent::before();

	// 	// kung dili cashiers
	// 	Response::redirect('/');
	// }
	public function action_index()
	{
		//$view->users = Model_User::find('all');
	

	
		$search = "";
		if (Input::method() == 'POST')
		{
			
			$search = Input::post('search');
		}

		$view['users'] = Model_User::find('all', [
			'where' => [
				['firstname', 'like', "%$search%"]
			]
		]);
	
		
		$view['users'] = Model_User::find('all');
		$view['students'] = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = View::forge('admin/cashiers/index', $view);

		// $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	}
	public function action_create()
	{
		

	}

	public function action_index_miscellanous()
	{
		$view = View::forge('admin/cashiers/index_miscellanous');
		$view->programs = Model_Program::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Programs";
		$this->template->content = $view;

	}

	public function action_add_miscellanous()
	{
		$view = View::forge('admin/cashiers/create_miscellanous');
 		$view->programs = Model_Program::find('all');
		if (Input::method() == 'POST')
		{
			$val = Model_Miscellanou::validate('create');

			if ($val->run())
			{
				$miscellanou = Model_Miscellanou::forge(array(
					'program_id' => Input::post('program_id'),
					'type' => Input::post('type'),
					'amount' => Input::post('amount')
				));

				if ($miscellanou->save())
				{
					Session::set_flash('success', e('Added miscellanou'.$miscellanou->id.'.'));

					Response::redirect('admin/cashiers');
				}
					else
					{
						Session::set_flash('error', e('Could not save user.'));
					}
			}	
			else
			{
				Session::set_flash('error', $val->error());
			}
		
		}
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'id', 'program_description'));
		$this->template->title = "New Miscellanous";
		$this->template->content = $view;
		// $data['programs'] = DB::select('*')->from('programs')->where('id', '=', $program_id)->as_object()->execute();
	}

	public function action_add_basic_miscellanous()
	{
		$view = View::forge('admin/cashiers/create_basic_miscellanous');
 		$view->programs = Model_Basicprogram::find('all');
		if (Input::method() == 'POST')
		{
			$val = Model_Basicmiscellanou::validate('create');

			if ($val->run())
			{
				$miscellanou = Model_Basicmiscellanou::forge(array(
					'basic_program_id' => Input::post('basic_program_id'),
					'type' => Input::post('type'),
					'amount' => Input::post('amount')
				));

				if ($miscellanou->save())
				{
					Session::set_flash('success', e('Added Basic Miscellaneous'.$miscellanou->id.'.'));

					Response::redirect('admin/cashiers');
				}
					else
					{
						Session::set_flash('error', e('Could not save user.'));
					}
			}	
			else
			{
				Session::set_flash('error', $val->error());
			}
		
		}
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Basicprogram::find('all'), 'id', 'basic_program_description'));
		$this->template->title = "New Basic Miscellaneous";
		$this->template->content = $view;
		// $data['programs'] = DB::select('*')->from('programs')->where('id', '=', $program_id)->as_object()->execute();
	}

	public function action_view_misc($id = null)
	{
		// $view['histories'] = Model_Studhistorie::find('all');
		
		$view['miscellanous'] = Model_Miscellanou::find('all', [
			'where' => [
				['program_id', 'like', "$id"]
			]
		]);
		// $view['misc'] = DB::select('*')->from('miscellanous')->where()
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('admin/cashiers/view_misc', $view);
	}


	public function action_view($id = null)
	{
		// $view['histories'] = Model_Studhistorie::find('all');

		
		// $view['users'] = Model_Student::find('student_id', [
		// 	'where' => [
		// 		['id', 'like', "$id"]
		// 	]
		// ]);
		$view['misc'] = Model_Miscellanou::find('all');
		$view['programs'] = Model_Program::find('all');
		$view['students'] = Model_Student::find('all', [
		'related' => array(
			'user', 'history' => array(
				'order_by' => [
					'id' => 'desc'
					]
				)
			),
		'where' => array(
			'student_id' => Auth::get('id')
			)
		]);
		var_dump($view['misc']);die; 
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('admin/cashiers/view', $view);
	}









	public function action_pay_message($id = null)
	{	
		
		$data['studparents'] = Model_Studparent::find('all');
		$data['users'] = Model_User::find('all');
		$data['students'] = DB::select('*')->from('students')->where('id', '=', $id)->as_object()->execute();
		$data['dates'] = DB::select('date_time')->from('accountantcrons')->order_by('id','desc')->limit(1)->as_object()->execute();
		$arrnumber = array();
		$arrmessage = array(); 
		foreach ($data['dates'] as $date){ 

			 }
			  foreach ($data['students'] as $student){ 
				 
					$data['studhistories'] = DB::select('down_payment')->from('studhistories')->where('studenthistory_id', '=', $student->id)->order_by('id','desc')->limit(1)->as_object()->execute();
					$downpayment = $data['studhistories'];
				
				 foreach ($data['studhistories'] as $studhistory){ 
					  foreach ($data['users'] as $user){ 
					 	 if ($student->student_id == $user->id){ 
							 foreach ($data['studparents'] as $studparent){ 
								 if ($studparent->student_id == $student->id){ 
									 foreach ($data['users'] as $use){ 
										 if ($studparent->parent_id == $use->id){
											
											  $total = $student->tuition_fee + $student->misc; 

											 // <!-- START MESSAGE TO BE EXECUTED -->
											  $message = "Good Day! " . $use->lastname. ", " . $use->firstname . " You have paid: " . $studhistory->down_payment. " pesos " . "(" . date('d/M/y h:i:s') .")";

											if($student->balance != 0){
												$message .= " Good day! Your overall payment is: Php " . $total . " Your downpayment: Php " . $student->down_payment . " Your Balance: Php " . $student->balance . " Thank you!"; 
											}
											
												
											 
												array_push($arrnumber, $use->mobile_number);
												array_push($arrmessage, $message);
											
											//  END MESSAGE TO BE EXECUTED 
										
										 	} 
										 }
								 	} 
								 }

								

								  $total = $student->tuition_fee + $student->misc; 
									
								// START MESSAGE TO BE EXECUTED 
								  $messages = "Good Day! " . $user->lastname. ", " . $user->firstname . " You have paid: " . $studhistory->down_payment. " pesos " . "(" . date('d/M/y h:i:s') .")";
									
									if($student->balance != 0){
										$messages .= " Your balance: " . $student->balance . " pesos. Thank You!"; 
									}

									array_push($arrnumber, $user->mobile_number);
									array_push($arrmessage, $messages);
								
								
						
						 // START SEMAPHORE SEND SMS NOTIFICATION 
						 
							
							$x=0;
						

							 
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

										// if status == sucses
											// save

										$resultArray[] = $fields;
										
									/*}*/
									$x++;

								}
							
						// END SEMAPHORE SEND SMS NOTIFICATION
						 
						// Session::set_flash('success', e('SMS Notification have been sent to students and parent mobile number'));
						
							
							 } 
						 }
					 }
				 }
		 //Response::redirect('admin/cashiers'); 

		echo header('Content-Type: application/json'); 

		echo json_encode($resultArray);	


		$this->template= null;

	}




















	public function action_edit($id = null)
	{
		$student = Model_Student::find($id);

		$info['students'] = Model_Student::find('all', [
			'where' => [
				['id', 'like', "$id"]
			]
		]);

		$val = Model_Student::validate('edit');

		foreach ($info['students'] as $value) {

			$info['programs'] = Model_Program::find('all', [
				'where' => [
					['program_description', 'like', "$value->program"]
				]
			]);

		}

		foreach ($info['programs'] as $program) {

			$info['miscellanous'] = Model_Miscellanou::find('all', [
				'where' => [
					['program_id', 'like', "$program->id"]
				]
			]);

		}
		$miscellaneous_total = 0;
		foreach ($info['miscellanous'] as $miscinfo) {
			$miscellaneous_total = $miscellaneous_total + $miscinfo->amount;
		}
		echo $miscellaneous_total;
	

		date_default_timezone_set("Asia/Manila");
		if ($val->run())
		{

			$student->student_id = Input::post('student_id');
			$student->scholarship_id = Input::post('scholarship_id');
			$student->dis_misc = Input::post('dis_misc');
			$student->dis_tuition = Input::post('dis_tuition');
			$student->program = Input::post('program');
			$student->year = Input::post('year');
			$student->tuition_fee = Input::post('tuition_fee');
			$student->misc = $miscellaneous_total;
			$student->down_payment = $student->down_payment + Input::post('down_payment');
			$discount_tuition = $student->tuition_fee - (($student->tuition_fee / 100) *  ($student->dis_tuition));
			$discount_misc = $student->misc - (($student->misc / 100) * ($student->dis_misc));
			$student->breakdown = ($student->tuition_fee + $student->misc) / 4;
			$student->balance = ($discount_tuition + $discount_misc) - $student->down_payment;

			$balance = $student->balance;
			if($balance < 0){

				Session::set_flash('error', e('Invalid amount of payment'));
				
				Response::redirect('admin/cashiers/edit/'. $id);

			}

			$student->history[] = Model_Studhistorie::forge(array(
					'studenthistory_id'=> $id,
					'program_description' => $student->program,
					'tuition_fee' => Input::post('tuition_fee'),
					'misc' => Input::post('misc'),
					'down_payment' => Input::post('down_payment'),
					'payment' => $student->down_payment,
					'breakdown' => ($student->tuition_fee + $student->misc) / 4,
					'dis_tuition' => $student->dis_tuition,
					'dis_misc' => $student->dis_misc,
					'balance' => ($student->tuition_fee + $student->misc) - $student->down_payment,
					'date_time' => date('D d M Y') . " " . date("h:i:s"),
                    
			));
			if ($student->save())
			{

				Session::set_flash('success', e('Updated student #' . $id));
				
				Response::redirect('admin/cashiers/pay_message/'. $id);
			}

			else
			{
				Session::set_flash('error', e('Could not update user #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$student->student_id = Input::post('student_id');		
				
				$student->course = Input::post('course');
				$student->tuition_fee = Input::post('tuition_fee');
				$student->misc = Input::post('misc');
				$student->down_payment = Input::post('down_payment');
				$student->breakdown = Input::post('breakdown');
				$student->balance = Input::post('balance');
				
				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('student', $student, false);
		}
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/cashiers/edit');

	}

	public function action_edit_misc($id = null)
	{

		$view = View::forge('admin/cashiers/edit_misc');
		$view->programs = Model_Program::find('all');
		$misc = Model_Miscellanou::find($id);
		$val = Model_Miscellanou::validate('edit');
		if ($val->run())
		{

			$misc->program_id = Input::post('program_id');	
			$misc->type = Input::post('type');
			$misc->amount = Input::post('amount');

			if ($misc->save())
			{

				Session::set_flash('success', e('Updated misc #' . $id));
				
				Response::redirect('admin/cashiers/view_misc/'. $id);
			}

			else
			{
				Session::set_flash('error', e('Could not update misc #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$misc->program_id = Input::post('program_id');	
				$misc->type = Input::post('type');
				$misc->amount = Input::post('amount');
				
				
				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('miscellanou', $misc, false);
		}
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'id', 'program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}

	public function action_delete_misc($id = null)
	{
		if ($misc = Model_Miscellanou::find($id))
		{
			$misc->delete();

			Session::set_flash('success', e('Delete miscellanous #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete miscellanous #'.$id));
		}

		Response::redirect('admin/cashiers/view_misc/' . $id);

	}

	// public function action_edit($id = null)
	// {
	// 	$student = Model_Student::find($id);
	// 	$val = Model_Student::validate('edit');
	// 	date_default_timezone_set("America/New_York");
	// 	if ($val->run())
	// 	{

	// 		$student->student_id = Input::post('student_id');
	// 		$student->program = Input::post('program');
	// 		$student->year = Input::post('year');
	// 		$student->tuition_fee = Input::post('tuition_fee');
	// 		$student->misc = Input::post('misc');
	// 		$student->other_fees = Input::post('other_fees');
	// 		$student->down_payment = $student->down_payment + Input::post('down_payment');
			
	// 		$student->breakdown = ($student->tuition_fee + $student->misc + $student->other_fees) / 4;
	// 		$student->balance = ($student->tuition_fee + $student->misc + $student->other_fees) - $student->down_payment;

	// 		$student->history[] = Model_Studhistorie::forge(array(
	// 				'studenthistory_id'=> $id,
	// 				'program_description' => $student->program,
	// 				'tuition_fee' => Input::post('tuition_fee'),
	// 				'misc' => Input::post('misc'),
	// 				'other_fees' => Input::post('other_fees'), 
	// 				'down_payment' => Input::post('down_payment'),
	// 				'payment' => $student->down_payment,
	// 				'breakdown' => ($student->tuition_fee + $student->misc + $student->other_fees) / 4,
	// 				'balance' => ($student->tuition_fee + $student->misc + $student->other_fees) - $student->down_payment,
	// 				'date_time' => date('D d M Y') . " " . date("h:i:s"),
                    
	// 		));
	// 		if ($student->save())
	// 		{

	// 			Session::set_flash('success', e('Updated student #' . $id));
				
	// 			Response::redirect('admin/cashiers/pay_message/'. $id);
	// 		}

	// 		else
	// 		{
	// 			Session::set_flash('error', e('Could not update user #' . $id));
	// 		}
	// 	}

	// 	else
	// 	{
	// 		if (Input::method() == 'POST')
	// 		{
	// 			$student->student_id = Input::post('student_id');
	// 			$student->course = Input::post('course');
	// 			$student->tuition_fee = Input::post('tuition_fee');
	// 			$student->misc = Input::post('misc');
	// 			$student->down_payment = Input::post('down_payment');
	// 			$student->breakdown = Input::post('breakdown');
	// 			$student->balance = Input::post('balance');
				
	// 			Session::set_flash('error', $val->error());
	// 		}

	// 		$this->template->set_global('student', $student, false);
	// 	}
	// 	$this->template->title = "Users";
	// 	$this->template->content = View::forge('admin/cashiers/edit');

	// }

}
