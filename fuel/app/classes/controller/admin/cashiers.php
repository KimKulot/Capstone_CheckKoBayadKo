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
		$view['miscellaneous'] = Model_Miscellanou::find('all');
		$view['basic_miscellaneous'] = Model_Basicmiscellanou::find('all');
		$view['programs'] = Model_Program::find('all');
		$view['basic_programs'] = Model_Basicprogram::find('all');
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

	/*
	* Fetch data from model that connect to database
	* Function for index basic education miscellaneous
	*
	* @params
	*
	*/

	public function action_index_basic_miscellanous()
	{
		$view = View::forge('admin/cashiers/index_basic_miscellanous');
		$view->programs = Model_Basicprogram::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Basic Programs";
		$this->template->content = $view;

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

	/*
	* 
	* Function for you to view basic education miscellaneous
	*
	*/
	public function action_view_basic_misc($id = null)
	{
		// $view['histories'] = Model_Studhistorie::find('all');
		
		$view['miscellanous'] = Model_Basicmiscellanou::find('all', [
			'where' => [
				['basic_program_id', 'like', "$id"]
			]
		]);
		// $view['misc'] = DB::select('*')->from('miscellanous')->where()
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('admin/cashiers/view_basic_misc', $view);
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
		$val = Model_Student::validate('edit');

		// $info['students'] = Model_Student::find('all', [
		// 	'where' => [
		// 		['id', 'like', "$id"]
		// 	]
		// ]);


		// foreach ($info['students'] as $value) {

		// 	$info['programs'] = Model_Program::find('all', [
		// 		'where' => [
		// 			['program_description', 'like', "$value->program"]
		// 		]
		// 	]);

		// }

		// foreach ($info['programs'] as $program) {

		// 	$info['miscellanous'] = Model_Miscellanou::find('all', [
		// 		'where' => [
		// 			['program_id', 'like', "$program->id"]
		// 		]
		// 	]);

		// }
		// $miscellaneous_total = 0;
		// foreach ($info['miscellanous'] as $miscinfo) {
		// 	$miscellaneous_total = $miscellaneous_total + $miscinfo->amount;
		// }
		// echo $miscellaneous_total;
	

		date_default_timezone_set("Asia/Manila");
		if ($val->run())
		{
			// start check what is the discount of the student
			$mis_dis = 0;
			$tui_dis = 0;

			$student->scholarship_id = Input::post('scholarship_id');

			$scholardiscount = Model_Scholarship::find('all', [
				'where' => [
					['id', 'like', "$student->scholarship_id"]
				]
			]);

			foreach ($scholardiscount as $scholardis) {
				$mis_dis = $scholardis->dis_misc;
				$tui_dis = $scholardis->dis_tuition;
			}

			// end check what is the discount of the student

			$student->student_id = Input::post('student_id');
			
			$student->program = Input::post('program');
			$student->year = Input::post('year');
			$student->tuition_fee = Input::post('tuition_fee');
			$student->misc = Input::post('misc');
			$student->dis_misc = ($mis_dis/100) * $student->misc;

			$student->dis_tuition = ($tui_dis/100) * $student->tuition_fee;
			$student->total_assessment = $student->tuition_fee + $student->misc;

			$student->down_payment = $student->down_payment + Input::post('down_payment');

			// $discount_tuition = $student->tuition_fee - (($student->tuition_fee / 100) *  ($student->dis_tuition));

			// $discount_misc = $student->misc - (($student->misc / 100) * ($student->dis_misc));
			$student->breakdown = ($student->tuition_fee + $student->misc) / 4;
			// echo $student->down_payment;die;
			$student->balance = $student->total_assessment - ($student->dis_tuition + $student->dis_misc + $student->down_payment);
			
			$balance = $student->balance;
			if($balance < 0){

				Session::set_flash('error', e('Invalid amount of payment'));
				
				Response::redirect('admin/cashiers/edit/'. $id);

			}

			$student->history[] = Model_Studhistorie::forge(array(
					'studenthistory_id'=> $id,
					'program_description' => $student->program,
					'total_assessment' => $student->total_assessment,
					'tuition_fee' => $student->tuition_fee,
					'misc' => $student->misc,
					'down_payment' => Input::post('down_payment'),
					'payment' => $student->down_payment,
					'breakdown' => ($student->tuition_fee + $student->misc) / 4,
					'dis_tuition' => $student->dis_tuition,
					'dis_misc' => $student->dis_misc,
					'balance' => $student->balance,
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
		$misc = Model_Miscellanou::find($id);

		$student['students'] = Model_Student::find('all');

		$program['programs'] = Model_Program::find('all', [
			'where' => [
				['id', 'like', "$id"]
			]
		]);
		// var_dump($program['programs']->program_description);die;
		
		// $student = Model_Student::find($id);
		// die;
		// var_dump($program['programs']);
		// die;

		// var_dump($student['students']);die;


		$program['programs'] = Model_Program::find('all');


		$view = View::forge('admin/cashiers/edit_misc');
		$view->programs = Model_Program::find('all');
		
		$val = Model_Miscellanou::validate('edit');

		if ($val->run())
		{

			$misc->program_id = Input::post('program_id');	
			$misc->type = Input::post('type');
			$tempmisc = $misc->amount;

			foreach ($program['programs'] as $pro) {
				foreach ($student['students'] as $stud) {
					if($stud->program == $pro->program_description){
						$formula_dis_misc = 0;
						$estudyantes = Model_Student::find($stud->id);
						$estudyantes->misc = $estudyantes->misc - $tempmisc;
						$estudyantes->save();
					}
				}
			}

			$misc->amount = Input::post('amount');

			foreach ($program['programs'] as $pro) {
				foreach ($student['students'] as $stud) {
					if($stud->program == $pro->program_description){
						$estudyantes = Model_Student::find($stud->id);
						
						$formula_dis_misc = ($estudyantes->dis_misc / ($estudyantes->misc + $tempmisc)) * 100;
						$estudyantes->misc = $estudyantes->misc + $misc->amount;
						$estudyantes->total_assessment =  $estudyantes->tuition_fee + $estudyantes->misc;
						$estudyantes->dis_misc = $estudyantes->misc - ($estudyantes->misc * ('0.'. $formula_dis_misc));

						// echo $estudyantes->total_assessment - ($estudyantes->down_payment + $estudyantes->dis_misc) . "<br>";
						$estudyantes->balance = $estudyantes->total_assessment - ($estudyantes->down_payment + $estudyantes->dis_misc);
						$estudyantes->save();
					}
				}
			}

			if ($misc->save())
			{

				Session::set_flash('success', e('Updated misc #' . $id));
				
				Response::redirect('admin/cashiers/view_misc/'. $misc->program_id);
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


	/*
	* Editing miscellaneous for Basic Education 
	*
	*
	*/

	public function action_edit_basic_misc($id = null)
	{
		$misc = Model_Basicmiscellanou::find($id);

		$student['students'] = Model_Student::find('all');

		$program['programs'] = Model_Basicprogram::find('all', [
			'where' => [
				['id', 'like', "$id"]
			]
		]);
		// var_dump($program['programs']->program_description);die;
		
		// $student = Model_Student::find($id);
		// die;
		// var_dump($program['programs']);
		// die;

		// var_dump($student['students']);die;
		
		$program['programs'] = Model_Basicprogram::find('all');



		$view = View::forge('admin/cashiers/edit_basic_misc');
		$view->programs = Model_Basicprogram::find('all');
		
		$val = Model_Basicmiscellanou::validate('edit');

		if ($val->run())
		{

			$misc->basic_program_id = Input::post('basic_program_id');	
			$misc->type = Input::post('type');
			$tempmisc = $misc->amount;


			foreach ($program['programs'] as $pro) {
				foreach ($student['students'] as $stud) {
					if($stud->program == $pro->basic_program_description){
						$formula_dis_misc = 0;
						$estudyantes = Model_Student::find($stud->id);

						if ($estudyantes->misc < $tempmisc) {
							$estudyantes->misc = $tempmisc - $estudyantes->misc;
						}else{
							$estudyantes->misc = $estudyantes->misc - $tempmisc;
						}	
						$estudyantes->save();
					}
				}
			}

						// echo $estudyantes->dis_misc;	
						// if($estudyantes->dis_misc == 0){
						// 	$formula_dis_misc = 0;
						// }else{
						// 	$formula_dis_misc = ($estudyantes->dis_misc / ($estudyantes->misc + $tempmisc)) * 100;
						// }
			$arrscholar = array();
			$misc->amount = Input::post('amount');

			foreach ($program['programs'] as $pro) {
				foreach ($student['students'] as $stud) {
					if($stud->program == $pro->basic_program_description){
						
						// check scholarship acquired
						$scholarships = Model_Scholarship::find('all', [
							'where' => [
								['id', 'like', "$estudyantes->scholarship_id"]
							]
						]);
						
						foreach ($scholarships as $scholar) {
							
						}
					    $scholar->dis_misc;
						// var_dump($arrscholar[0]);die;

						// check scholarship acquired
						$estudyantes = Model_Student::find($stud->id);
						$counter = 0;
						
						// echo $misc->amount;
						
						

						// echo $formula_dis_misc;
						
						// for editing student miscellaneous
						$estudyantes->misc = $estudyantes->misc + $misc->amount;
						// end for editing student miscellaneous

						// for editing student Total Assessment
						$estudyantes->total_assessment =  $estudyantes->tuition_fee + $estudyantes->misc;
						// end for editing student Total Assessment

						// echo $formula_dis_misc;
						// for editing student Discount Miscellaneous
						$estudyantes->dis_misc = ($scholar->dis_misc/100) * $misc->amount;
						// echo $estudyantes->dis_misc;
						// end for editing student Discount Miscellaneous

						// echo $estudyantes->total_assessment - ($estudyantes->down_payment + $estudyantes->dis_misc) . "<br>";

						$estudyantes->balance = $estudyantes->total_assessment - ($estudyantes->down_payment + $estudyantes->dis_misc);
						// echo $estudyantes->balance;
						$estudyantes->save();
					}
				}
			}
			
			if ($misc->save())
			{

				Session::set_flash('success', e('Updated misc #' . $id));
				
				Response::redirect('admin/cashiers/view_basic_misc/'. $misc->basic_program_id);
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

				$misc->basic_program_id = Input::post('basic_program_id');	
				$misc->type = Input::post('type');
				$misc->amount = Input::post('amount');
				
				
				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('miscellanou', $misc, false);
		}
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Basicprogram::find('all'), 'id', 'basic_program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}




	public function action_add_miscellanous()
	{
		$view = View::forge('admin/cashiers/create_miscellanous');
 		$view->programs = Model_Program::find('all');
 		$program['programs'] = Model_Program::find('all');
 		$student['students'] = Model_Student::find('all');
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


				foreach ($program['programs'] as $pro) {
					foreach ($student['students'] as $stud) {
						if($stud->program == $pro->program_description){
							$formula_dis_misc = 0;
							$estudyantes = Model_Student::find($stud->id);
							$temp_misc = $estudyantes->misc;
							// echo $temp_misc; 
							$estudyantes->misc = $estudyantes->misc + $miscellanou->amount;
							 // echo $estudyantes->dis_misc . "<br>";

							$formula_dis_misc = ($estudyantes->dis_misc / $temp_misc) * 100;

							// echo $formula_dis_misc;
							$estudyantes->total_assessment =  $estudyantes->tuition_fee + $estudyantes->misc;

							$estudyantes->dis_misc = $estudyantes->misc - ($estudyantes->misc * ('0.'. $formula_dis_misc));
							// echo $estudyantes->dis_misc . "<br>";

							// echo $estudyantes->total_assessment - ($estudyantes->down_payment + $estudyantes->dis_misc) . "<br>";
							$estudyantes->balance = $estudyantes->total_assessment - ($estudyantes->down_payment + $estudyantes->dis_misc);



							$estudyantes->save();
						}
					}
				}

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



	public function action_delete_misc($id = null)
	{
		// echo $id;
		$data_misc = Model_Miscellanou::find('all', [
			'where' => [
				['id', 'like', "$id"]
			]
		]);
		$misc_program_id = 0;
		$misc_program_amount = 0;
		$course_compare = "";
		foreach ($data_misc as $mischeck) {
			$misc_program_id = $mischeck['program_id'];
			$misc_program_amount = $mischeck['amount'];
		}
		echo $misc_program_amount;
		echo $misc_program_id;
		$data_program = Model_Program::find('all', [
			'where' => [
				['id', 'like', "$misc_program_id"]
			]
		]);

		foreach ($data_program as $prog) {
			$course_compare = $prog->program_description;
		}
		$data_stud = Model_Student::find('all', [
			'where' => [
				['program', 'like', "$course_compare"]
			]
		]);

		


		if ($misc = Model_Miscellanou::find($id))
		{

			$misc->delete();

			foreach ($data_stud as $stud_data) {
				$percentage_disc = ($stud_data->dis_misc / $stud_data->misc) *100;
				
				
				$stud_data->misc = $stud_data->misc - $misc_program_amount;
				
				$stud_data->total_assessment = $stud_data->misc + $stud_data->tuition_fee;

				$stud_data->dis_misc = $stud_data->misc * ("0." . $percentage_disc);
				$stud_data->balance = $stud_data->total_assessment - ($stud_data->down_payment + $stud_data->dis_misc);

				$stud_data->save();
			}

				Session::set_flash('success', e('Delete miscellanous #'.$id));
			}

		else
		{
			Session::set_flash('error', e('Could not delete miscellanous #'. $id));
		}

		Response::redirect('admin/cashiers/view_misc/' . $misc_program_id);

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
