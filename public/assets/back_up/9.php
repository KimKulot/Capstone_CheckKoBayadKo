<?php
class Controller_Admin_Users extends Controller_Admin
{

	public function action_index()
	{
		$search = "";
		if (Input::method() == 'POST')
		{
			$search = Input::post('search');
		} 

		$data['users'] = Model_User::find('all', [
			'where' => [
				['username', 'like', "%$search%"]
			]
		]);

		$data['roles'] = Model_Role::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/index', $data);
	}

	public function get_list()
    {
        return $this->response(array(
            'foo' => "foo",
            'baz' => array(
                1, 50, 219
            ),
            'empty' => null
        ));
    }

	public function action_graveyard()
	{
		$search = "";
		if (Input::method() == 'POST')
		{
			$search = Input::post('search');
		}
		// $data['users'] = DB::select('*')->from('users')->where('username', 'like', "%search%")->as_object()->execute();
		$data['users'] = Model_User::find_deleted('all', [
			'where' => [
				['username', 'like', "%$search%"]
			]
		]);
		$data['roles'] = Model_Role::find('all');

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/graveyard', $data);
	}

	public function action_cron_message()
	{ 	

		$data['dates'] = DB::select('date_time')->from('accountantcrons')->order_by('id','desc')->limit(1)->as_object()->execute();
		$data['studparents'] = Model_Studparent::find('all');
		$data['users'] = Model_User::find('all', [
			'where' => [
				['send_at', 'like', "0"]
			]
		]);
		$data['students'] = Model_Student::find('all');
		/*where 
		*/

		// BEGIN DATE FORMULA
		 date_default_timezone_set('Asia/Manila');
			$date_Counter = 7; 
			$diff = 0;
		 $useNumber = array();
		 $arrmessage = array(); 
		 $arruser_id = array();

		 foreach ($data['dates'] as $date){
			
			$subdate = 0;
			$currentDate = date('m/d/Y', strtotime("+". $date_Counter. " days"));

			$var_date = trim($date->date_time);

				if ($currentDate == $var_date) {

					 

					  foreach ($data['students'] as $student){
						  foreach ($data['users'] as $user){ 
						 	 if ($student->student_id == $user->id){ 
								 foreach ($data['studparents'] as $studparent){ 
									 if ($studparent->student_id == $student->id){ 
										 foreach ($data['users'] as $use){ 
											 if ($studparent->parent_id == $use->id){ 

												  $total = $student->tuition_fee + $student->misc; 

												  $messages = "Parent Name:" . $use->lastname . ", " .  $use->firstname . " " . $use->middlename . 
												" Mobile Number: " . $use->mobile_number . " " . 
												"Hello! The date of exam will be: " . $date->date_time;

												if($student->balance != 0){
													$messages .= "Your total payment is: " . $total .
													" Your payment: " . $student->down_payment .
													" Your Outstanding Balance: " . $student->balance ; 
												}
												array_push($arrmessage, $messages);
												array_push($useNumber, $use->mobile_number);
												array_push($arruser_id, $use->id);

											 }
										 } 
									 }
								 } 
								
									  $total = $student->tuition_fee + $student->misc; 

									
									  $message = "Good day " .  $user->lastname . ", " . $user->firstname. " Mobile Number: " . $user->mobile_number . "Hello! The date of exam will be: " . $date->date_time ;
									if($student->balance != 0){
										$message .= "Your total payment is: " . $total . 
										"Your payment: " . $student->down_payment . 
										"Your Outstanding Balance: " . $student->balance; 

									}
									array_push($arruser_id, $user->id);
									array_push($arrmessage, $message); 
									array_push($useNumber, $user->mobile_number);
								// START SEMAPHORE SEND SMS NOTIFICATION 
							// $numberTmp = explode("/", str_replace(array("-","+"),"",str_replace(",","/",$_REQUEST['to'])));
							// $resultArray = array();

							
							// foreach( $numberTmp as $tmp)
							// {
							// 	$tmp = trim($tmp);
							// 	if(  strlen($tmp) == "12" && substr($tmp,0,2) == "63" )
							// 	{
							// 	 $useNumber[] = $tmp;
							// 	}
							// 	else if( strlen($tmp) == "11" && substr($tmp,0,2) == "09"  )
							// 	{
							// 	 $useNumber[] = "63" . substr($tmp,1,10);
							// 	}
							// }
							

								 }
							}
					 	 


				 
					}
				}
 	
			}

$x=0;
foreach($useNumber as $mynumber)
{

	/*foreach ($arrmessage as $messages) 
	{*/
		$url = 'http://api.semaphore.co/api/sms';
		 $fields = array(
	        'api' => 'LVpxU61qZzU4pEW2czJc',
	        'number' => $mynumber,
	        'message' => $arrmessage[$x],
	        'user_id' => $arruser_id[$x],
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
		
		$fields['status'] = $varjson->status;

		// if status == sucses
			// save
		
		if($fields['status'] != 'failure');
		{	
			echo $fields['message'] . "<br>" . $fields['user_id'];
			$id = $fields['user_id'];
			$edit_data['users'] = Model_User::find('all', [
				'where' => [
					['id', 'like', "$id"]
				]
			]);
			foreach ($edit_data['users'] as $edit_user) {
				$edit_user->send_at = 1;
				$edit_user->save(); 
			}
			
		} 
		

		$resultArray[] = $fields;
		
	/*}*/
	$x++;

}

	// print_r($resultArray);
 // simple print output....

// END SEMAPHORE SEND SMS NOTIFICATION 

 echo header('Content-Type: application/json'); 

	 echo json_encode($resultArray);	


		 $this->template= null;
}


































	public function action_index_search()
	{	
		$search = "";
		if (Input::method() == 'POST')
		{
			$search = Input::post('search');
		}
			$data ['users'] = DB::select('*')->from('users')->where('username','like', "%$search%")->as_object()->execute();
			$this->template->title = "Users";
			$this->template->content = View::forge('admin/users/index_search', $data);

	}

	public function action_notification()
	{
		$data ['mobile_number'] = DB::select('mobile_number')->from('users')->as_object()->execute();
		$this->template->title = "SMS Notification";
		$this->template->content = View::forge('admin/users/notification', $data);
	}
	
	public function action_view($id = null)
	{
		
		$data['user'] = Model_User::find($id); 
		$this->template->title = "User";
		$this->template->content = View::forge('admin/users/view', $data);

	}


	//START SETTING CRON
	
	public function action_setcron(){

 		$view['dates'] = Model_Accountantcron::find('all');
		if (Input::method() == 'POST')
		{  	
			$val = Model_Accountantcron::validate('create');

			
			if ($val->run())
			{
				$newuser = Model_Accountantcron::forge(array(
					'date_time'=> Input::post('date_time'),
				));
				if($newuser->save()){
					Session::set_flash('success', e('Set exam schedule'));
				 	Response::redirect('admin/users');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}

			
		}
		$this->template->title = "Setting up Cron Job";
		$this->template->content = View::forge('admin/users/setcron', $view);
	}
	//END SETTING CRON
	

	//START SETTING CRON
	
	public function action_basicsetcron(){
		$view = View::forge('admin/users/basicsetcron');
		// $view->programs = Model_Basicprogram::find('all');
 		$view->dates = Model_Basicaccountantcron::find('all');
 		
		if (Input::method() == 'POST')
		{  	
			$val = Model_Basicaccountantcron::validate('create');

			
			if ($val->run())
			{
				$newuser = Model_Basicaccountantcron::forge(array(
					'date_time'=> Input::post('date_time'),
					'basic_program' => Input::post('basic_program'),
				));
				if($newuser->save()){
					Session::set_flash('success', e('Set exam schedule'));
				 	Response::redirect('admin/users');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}

			
		}
		
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Basicprogram::find('all'), 'id', 'basic_program_description'));
		$this->template->title = "Setting up Cron Job";
		$this->template->content = $view;
	}
	//END SETTING CRON


	//START DEAN CREATION
	public function action_create_dean($id = null){
		$view = View::forge('admin/users/create_dean');
		$view->dean = Model_User::find($id);
		$view->programs = Model_Program::find('all');

		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			
				if ($val->run())
				{
					$newuser = Model_User::forge(array(
						'username'=> Input::post('username'),
						'firstname' =>Input::post('firstname'),
						'middlename'=> Input::post('middlename'),
						'lastname'=> Input::post('lastname'),
						'password'=> Auth::instance()->hash_password(Input::post('password')),
						'mobile_number'=> Input::post('mobile_number'),
						'group'=> Input::post('group'),
						'email'=> Input::post('email'),
						'role'=> Input::post('role'),
					));
					$newuser->dean_program = Model_Progdean::forge(array(
						'program_id'=> Input::post('program_id'),	

					));
					if($newuser->save()){
						Session::set_flash('success', e('Added user'));
					 	Response::redirect('admin/users');
				}

			// }catch(Exception $e){

			// 		Session::set_flash('error', e('Empty fields not allowed or email is already exist'));
			 }
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'id', 'program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}
	//END DEAN CREATION



	//START PARENT CREATION
	public function action_create_parent($id = null){
		$data['student'] = Model_User::find($id); 
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');
			// BEGIN CHECK IF USER FIRSTNAME AND LASTNAME IS EXISTING CONDITION
			
			
			// END CHECK IF USER FIRSTNAME AND LASTNAME IS EXISTING CONDITION
				if ($val->run())
				{
					//---------------------------------------------

					$firstname = Input::post('firstname');
					$lastname = Input::post('lastname');
					$udata['users'] = DB::select('*')->from('users')
					    ->where('firstname', $firstname)
					    ->and_where('lastname', $lastname)
						->as_object()
						->execute();
					
				
					if (count($udata['users'])) {
						foreach ($udata['users'] as $user) {
							
							$newuser = Model_Studparent::forge(array(
								'student_id'=> $id,
								'parent_id' => $user->id,
							));
							if($newuser->save()){
								Session::set_flash('success', e('Added user'));
							 	Response::redirect('admin/users');
							 }
							
						}
					//----------------------------------------------
					}else{
						
						$newuser = Model_User::forge(array(
							'username'=> Input::post('username'),
							'firstname' =>Input::post('firstname'),
							'middlename'=> Input::post('middlename'),
							'lastname'=> Input::post('lastname'),
							'password'=> Auth::instance()->hash_password(Input::post('password')),
							'mobile_number'=> 63 . Input::post('mobile_number'),
							'group'=> Input::post('group'),
							'email'=> Input::post('email'),
							'role'=> Input::post('role'),
						));
						$newuser->parent_student = Model_Studparent::forge(array(
							'student_id'=> $id,
						));
						if($newuser->save()){
							Session::set_flash('success', e('Added user'));
						 	Response::redirect('admin/users');
						}
					}
				 }else{
					Session::set_flash('error', $val->error());
				}
			}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create_parent', $data);

	}
	//END PARENT CREATION

//BEGIN BASIC EDUCATION STUDENT CREATION
	public function action_create_basic_student(){
		$view = View::forge('admin/users/create_basic_student');
 		$view->programs = Model_Basicprogram::find('all');
		if (Input::method() == 'POST')
		{  	
			
			
			$username = Input::post('username');
			$data['users'] =  Model_User::find('all', [
				'where' => [
					['username', 'like', "$username"]
				]
			]);

			$count = count($data['users']);
			// echo $count;
			if($count >= 1){
				Session::set_flash('success', e('Added user'));
				Response::redirect('admin/users/create_basic_student');
			}

			$scholarship_check = Input::post('scholarships');

			$data['scholarships'] = Model_Scholarship::find('all', [
				'where' => [
					['id', 'like', "$scholarship_check"]
				]
			]);

			// BEGIN DECLARATIONS
				$mdiscount = 0;
				$tdiscount = 0;
			// END DECLARATIONS
			foreach ($data['scholarships'] as $scholar) {
				$mdiscount = $scholar->dis_misc;
				$tdiscount = $scholar->dis_tuition;
			}

			// var_dump($data['scholarships']);die;
			$val = Model_User::validate('create');
			//$val = Model_Student::validate('create');
			// try{
			// 	$user = Auth::username_checker(
			// 		Input::post('username'),
			// 	    Input::post('email'),
			// 	    array(	
			// 	    	)
			// );

			if ($val->run())
			{
				$amount = 0;
				$data = DB::select('id')->from('basicprograms')->where('basic_program_description', '=', Input::post('year'))->as_object()->execute();

				foreach ($data as $programid) {
					$program_result = DB::select('amount')->from('basicmiscellanous')->where('basic_program_id', '=', $programid->id)->as_object()->execute();
					// $amount += $program_result;
				}
				// var_dump($program_result); die;
				foreach ($program_result as $key) {
						$amount += $key->amount; 
				}

				$newuser = Model_User::forge(array(
					'username'=> Input::post('username'),
					'firstname' =>Input::post('firstname'),
					'middlename'=> Input::post('middlename'),
					'lastname'=> Input::post('lastname'),
					'password'=> Auth::instance()->hash_password(Input::post('password')),
					'mobile_number'=> 63 . Input::post('mobile_number'),
					'group'=> Input::post('group'),
					'email'=> Input::post('email'),
					'role'=> Input::post('role'),
				));
				$discount_balance = $amount - ($mdiscount/100) * $amount;
				// var_dump($mdiscount);die;
				$newuser->student = Model_Student::forge(array(
					'program' =>Input::post('year'),
					'year' =>Input::post('year'),
					'scholarship_id' =>Input::post('scholarships'),
					'total_assessment' => $amount,
					'tuition_fee' => 0,
					'misc' => $amount,
					'down_payment' => 0,
					'breakdown' => 0,
					'dis_tuition' => 0,
					'dis_misc' => ($mdiscount/100) * $amount,
					'balance' => $discount_balance,
				));

				if($newuser->save()){
					Session::set_flash('success', e('Added user'));
				 	Response::redirect('admin/users');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}

			
		}
		$view->set_global('basicprograms', Arr::assoc_to_keyval(Model_Basicprogram::find('all'), 'basic_program_description', 'basic_program_description'));
		$this->template->title= "Users";
		$this->template->content = $view ;

	}
	//END BASIC EDUCATION STUDENT CREATION

	//START STUDENT CREATION
	public function action_create_student(){
		$view = View::forge('admin/users/create_student');
 		$view->programs = Model_Program::find('all');
 		$view->scholarships = Model_Scholarship::find('all');
 		
		if (Input::method() == 'POST')
		{  	

			$username = Input::post('username');
			$data['users'] =  Model_User::find('all', [
				'where' => [
					['username', 'like', "$username"]
				]
			]);


			$count = count($data['users']);
			// echo $count;
			if($count >= 1){
				Session::set_flash('success', e('Added user'));
				Response::redirect('admin/users/create_student');
			}

			$scholarship_check = Input::post('scholarships');

			$data['scholarships'] = Model_Scholarship::find('all', [
				'where' => [
					['id', 'like', "$scholarship_check"]
				]
			]);

			// BEGIN DECLARATIONS
				$mdiscount = 0;
				$tdiscount = 0;
			// END DECLARATIONS
			foreach ($data['scholarships'] as $scholar) {
				$mdiscount = $scholar->dis_misc;
				$tdiscount = $scholar->dis_tuition;
			}
			// var_dump($data['scholarships']);die;
			$val = Model_User::validate('create');
			//$val = Model_Student::validate('create');
			// try{
			// 	$user = Auth::username_checker(
			// 		Input::post('username'),
			// 	    Input::post('email'),
			// 	    array(	
			// 	    	)
			// );
			if ($val->run())
			{
				$amount = 0;
				$data = DB::select('id')->from('programs')->where('program_description', '=', Input::post('program'))->as_object()->execute();
				foreach ($data as $programid) {
					$program_result = DB::select('amount')->from('miscellanous')->where('program_id', '=', $programid->id)->as_object()->execute();
					// $amount += $program_result;
				}	
				foreach ($program_result as $key) {
						$amount += $key->amount; 
				}

				$newuser = Model_User::forge(array(
					'username'=> Input::post('username'),
					'firstname' =>Input::post('firstname'),
					'middlename'=> Input::post('middlename'),
					'lastname'=> Input::post('lastname'),
					'password'=> Auth::instance()->hash_password(Input::post('password')),
					'mobile_number'=> 63 . Input::post('mobile_number'),
					'group'=> Input::post('group'),
					'email'=> Input::post('email'),
					'role'=> Input::post('role'),
				));
				//var_dump(Input::post('scholarships'));die;
				$discount_balance = $amount - ($mdiscount/100) * $amount;

				// var_dump($amount);die;
				$newuser->student = Model_Student::forge(array(
					'program' =>Input::post('program'),
					'year' =>Input::post('year'),
					'scholarship_id' =>Input::post('scholarships'),
					'total_assessment' => $amount,
					'tuition_fee' => 0,
					'misc' => $amount,
					'down_payment' => 0,
					'breakdown' => 0,
					'dis_tuition' => 0,
					'dis_misc' => ($mdiscount/100) * $amount,
					'balance' => $discount_balance,
				));
				if($newuser->save()){
					Session::set_flash('success', e('Added user'));
				 	Response::redirect('admin/users');
				}
				// }catch(Exception $e){
				// 	Session::set_flash('error', e('Username or Email is already exist'));
				// }
			// try{		
				//c bv aa $user = Auth::create_user(
				// 	    'Student',
				// 	    Input::post('password'),
				// 	    Input::post('firstname'),
				// 	    Input::post('middlename'),
				// 	    Input::post('lastname'),
				// 	    Input::post('mobile_number'),
				// 	    Input::post('email'),
				// 	    100,
				// 	    array(
				// 	        'firstname' => Input::post('firstname'),
				// 	        'middlename' => Input::post('middlename'),
				// 	        'lastname' => Input::post('lastname'),
				// 	        'password' => Input::post('password'),
				// 	    )
				// 	);
				// try{
				// 	$user = Auth::username_checker(
				// 		Input::post('username'),
				// 	    Input::post('email'),
				// 	    array(	
				// 	    	)
				// 	);
				

				// $user = Model_User::forge(array(
				// 	//'username' => field('username')->set_value('Student') ,
				// 	'username' => Input::post('username'),
				// 	'firstname' => Input::post('firstname'),
				// 	'middlename' => Input::post('middlename'),
				// 	'lastname' => Input::post('lastname'),
				// 	'password' => Auth::instance()->hash_password(Input::post('password')),
				// 	'mobile_number' => Input::post('mobile_number'),
				// 	'group' => Input::post('group'),
				// 	'email' => Input::post('email'),
				// 	'program' => Input::post('program'),
				// 	'user_id' => Input::post('user_id'),
					// $user->comments[] = new Model_Student();
				// ));
				// $student = Model_Student::forge(array(
				// 	'program' => Input::post('program'),
				// 	'user_id' => Input::post('user_id'),
				// ));

				// if($student->save()){
				// 	if ($user->save())
				// 	{
				// 		Session::set_flash('success', e('Added user'));

				// 		Response::redirect('admin/users');
				// 	}
				// }

			// }catch(Exception $e){

			// 		Session::set_flash('error', e('Empty fields not allowed or email is already exist'));
			// }
				// }catch(Exception $e){
				// 	Session::set_flash('error', e('Username or Email is already exist'));
				// }
			}
			else
			{
				Session::set_flash('error', $val->error());
			}

			
		}
		$scholarshipss = Model_Scholarship::find('all');
		$arrscholarship = array(); 
		$arrsid = array(); 
		 foreach($scholarshipss as $schol){ 
		 	array_push($arrsid, $schol->id);
			array_push($arrscholarship, $schol->scholarship);
		} 
		  
		
		// echo $schol->scholarship;
		//var_dump($scholarship->scholarship);die;

		// $scholar['scholars'] = Model_Scholarship::find('first');
		// foreach ($scholarship as $key) {
		// 	var_dump($key);
		// }
		
		//var_dump($view->scholarships);die;

		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'program_description', 'program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}
	//END STUDENT CREATION
	
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
			// try{
			// 	$user = Auth::create_user(
			// 		    Input::post('username'),
			// 		    Input::post('password'),
			// 		    Input::post('firstname'),
			// 		    Input::post('middlename'),
			// 		    Input::post('lastname'),
			// 		    Input::post('mobile_number'),
			// 		    Input::post('email'),
			// 		    100,
			// 		    array(
			// 		        'firstname' => Input::post('firstname'),
			// 		        'middlename' => Input::post('middlename'),
			// 		        'lastname' => Input::post('lastname'),
			// 		        'password' => Input::post('password'),
			// 		    )
			// 		);

				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Auth::instance()->hash_password(Input::post('password')),
					'firstname' => Input::post('firstname'),
					'middlename' => Input::post('middlename'),
					'lastname' => Input::post('lastname'),
					'mobile_number' => Input::post('mobile_number'),
					'group' => Input::post('group'),
					'email' => Input::post('email'),
					'role'=> Input::post('role'),
				));

				$check_user= DB::select('username')->from('users')->where('username','=', $user->username)->as_object()->execute();

				if (count($check_user) > 0) {
					Session::set_flash('error', e('Username already exists .'));
				}else{
					
				if ($user->save())
				{
					Session::set_flash('success', e('Added user'.$user->id.'.'));

					Response::redirect('admin/users');
				}

			// }catch(Exception $e){

			// 		Session::set_flash('error', e('Empty fields not allowed or email is already exist'));
			// }
					else
					{
						Session::set_flash('error', e('Could not save user.'));
					}
			    }
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create');

	}

	//START CREATE BASIC PROGRAM

public function action_create_basic_program()
	{
		$data['basicprograms'] = Model_Basicprogram::find('all');
		
		if (Input::method() == 'POST')
		{
			$val = Model_Basicprogram::validate('create');

			if ($val->run())
			{
				
				
				$basicprogram = Model_Basicprogram::forge(array(
					'basic_program_description' => Input::post('basic_program_description'),
				));
				$check_program = DB::select('basic_program_description')->from('basicprograms')->where('basic_program_description','=', $basicprogram->basic_program_description)->as_object()->execute();

				// if(count($check_program) > 0){

				// 	Session::set_flash('error', e('Program description already exists.'));
				// }else{
				// 	var_dump($check_program);die();
				// }

				if (count($check_program) > 0) {
					Session::set_flash('error', e('basic Program description already exists .'));
				}else{
					
				if ($basicprogram->save())
					{
						Session::set_flash('success', e('Added program'.$basicprogram->id.'.'));

						Response::redirect('admin/users');
					}
					
					else
					{
						Session::set_flash('error', e('Could not save program.'));
					}
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Program";
		$this->template->content = View::forge('admin/users/create_basic_program', $data);

	}

	//END CREATE BASIC PROGRAM







	//START CREATE PROGRAM

	public function action_create_program()
	{
		$data['programs'] = Model_Program::find('all');
		
		if (Input::method() == 'POST')
		{
			$val = Model_Program::validate('create');

			if ($val->run())
			{
				
				
				$program = Model_Program::forge(array(
					'program_description' => Input::post('program_description'),
				));
				$check_program = DB::select('program_description')->from('programs')->where('program_description','=', $program->program_description)->as_object()->execute();

				// if(count($check_program) > 0){

				// 	Session::set_flash('error', e('Program description already exists.'));
				// }else{
				// 	var_dump($check_program);die();
				// }

				if (count($check_program) > 0) {
					Session::set_flash('error', e('Program description already exists .'));
				}else{
					
				if ($program->save())
					{
						Session::set_flash('success', e('Added program'.$program->id.'.'));

						Response::redirect('admin/users');
					}
					
					else
					{
						Session::set_flash('error', e('Could not save program.'));
					}
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Program";
		$this->template->content = View::forge('admin/users/create_program', $data);

	}

	//END CREATE PROGRAM

	public function action_edit($id = null)
	{
		$view = View::forge('admin/users/edit');
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			if ($user->password != Input::post('password')) {
				$user->password = Auth::instance()->hash_password(Input::post('password'));
			}
			$user->username = Input::post('username');
			// $user->password = Input::post('password');
			$user->firstname = Input::post('firstname');
			$user->middlename = Input::post('middlename');
			$user->lastname = Input::post('lastname');
			$user->mobile_number = Input::post('mobile_number');
			$user->group = Input::post('group');
			$user->email = Input::post('email');
			$user->user_id = Input::post('user_id');
			if ($user->save())
			{
				Session::set_flash('success', e('Updated user #' . $id));

				Response::redirect('admin/users');
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
				$user->username = $val->validated('username');
				//$user->password = $val->validated('password');
				if ($user->password != Input::post('password')) {
					$user->password = $val->validated(Auth::instance()->hash_password(Input::post('password')));
				}
				$user->firstname = $val->validated('firstname');
				$user->middlename = $val->validated('middlename');
				$user->lastname = $val->validated('lastname');
				$user->mobile_number = $val->validated('mobile_number');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = $view;

	}

	// BEGIN EDIT DEAN
	public function action_edit_dean($id = null)
	{
		$view = View::forge('admin/users/edit_dean');
		$prog =   Model_Progdean::find('all', [
			'where' => [
				['user_id', 'like', "$id"]
			]
		]);
		foreach ($prog as $pro) {
			echo $pro->id;
		}
		$programdean = Model_Progdean::find($pro->id);
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');
		
		if ($val->run())
		{
			if ($user->password != Input::post('password')) {
				$user->password = Auth::instance()->hash_password(Input::post('password'));
			}
			$user->username = Input::post('username');
			// $user->password = Input::post('password');
			$user->firstname = Input::post('firstname');
			$user->middlename = Input::post('middlename');
			$user->lastname = Input::post('lastname');
			$user->mobile_number = Input::post('mobile_number');
			$user->group = Input::post('group');
			$user->email = Input::post('email');
			$user->user_id = Input::post('user_id');
			$programdean->program_id = Input::post('program_id');
			if($programdean->save()){
				if ($user->save())
				{ 
					Session::set_flash('success', e('Updated user #' . $id));

					Response::redirect('admin/users');
				}

				else
				{
					Session::set_flash('error', e('Could not update user #' . $id));
				}
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				//$user->password = $val->validated('password');
				if ($user->password != Input::post('password')) {
					$user->password = $val->validated(Auth::instance()->hash_password(Input::post('password')));
				}
				$user->firstname = $val->validated('firstname');
				$user->middlename = $val->validated('middlename');
				$user->lastname = $val->validated('lastname');
				$user->mobile_number = $val->validated('mobile_number');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}
		$view->programs = Model_Program::find('all');
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'id', 'program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}
	//END EDIT DEAN

	// BEGIN EDIT STUDENT
	public function action_edit_student($id = null)
	{
		$view = View::forge('admin/users/edit_student');
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			if ($user->password != Input::post('password')) {
				$user->password = Auth::instance()->hash_password(Input::post('password'));
			}
			$user->username = Input::post('username');
			// $user->password = Input::post('password');
			$user->firstname = Input::post('firstname');
			$user->middlename = Input::post('middlename');
			$user->lastname = Input::post('lastname');
			$user->mobile_number = 63 . Input::post('mobile_number');
			$user->group = Input::post('group');
			$user->email = Input::post('email');
			$user->user_id = Input::post('user_id');

			if ($user->save())
			{
				Session::set_flash('success', e('Updated user #' . $id));

				Response::redirect('admin/users');
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
				$user->username = $val->validated('username');
				//$user->password = $val->validated('password');
				if ($user->password != Input::post('password')) {
					$user->password = $val->validated(Auth::instance()->hash_password(Input::post('password')));
				}
				$user->firstname = $val->validated('firstname');
				$user->middlename = $val->validated('middlename');
				$user->lastname = $val->validated('lastname');
				$user->mobile_number = $val->validated('mobile_number');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'id', 'program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}
	//END EDIT STUDENT

	// BEGIN EDIT PARENT
	public function action_edit_parent($id = null)
	{
		$view = View::forge('admin/users/edit_parent');
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			if ($user->password != Input::post('password')) {
				$user->password = Auth::instance()->hash_password(Input::post('password'));
			}
			$user->username = Input::post('username');
			// $user->password = Input::post('password');
			$user->firstname = Input::post('firstname');
			$user->middlename = Input::post('middlename');
			$user->lastname = Input::post('lastname');
			$user->mobile_number = 63 . Input::post('mobile_number');
			$user->group = Input::post('group');
			$user->email = Input::post('email');
			$user->user_id = Input::post('user_id');

			if ($user->save())
			{
				Session::set_flash('success', e('Updated user #' . $id));

				Response::redirect('admin/users');
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
				$user->username = $val->validated('username');
				//$user->password = $val->validated('password');
				if ($user->password != Input::post('password')) {
					$user->password = $val->validated(Auth::instance()->hash_password(Input::post('password')));
				}
				$user->firstname = $val->validated('firstname');
				$user->middlename = $val->validated('middlename');
				$user->lastname = $val->validated('lastname');
				$user->mobile_number = $val->validated('mobile_number');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = $view;

	}
	//END EDIT PARENT

	public function action_delete($id = null)
	{
		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', e('Deactivate user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not deactivate user #'.$id));
		}

		Response::redirect('admin/users');

	}

	public function action_activate($id = null)
	{
		if ($user = Model_User::find_deleted($id))
		{
			$user->restore();

			Session::set_flash('success', e('Activate user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not Activate user #'.$id));
		}

		Response::redirect('admin/users');

	}

}
