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

	public function action_graveyard()
	{
		$search = "";
		if (Input::method() == 'POST')
		{
			$search = Input::post('search');
		}
		// $data['users'] = DB::select('*')->from('users')->where('username', 'like', "%search%")->as_object()->execute();
		$data['users'] = Model_User::find('all', [
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
		$data['users'] = Model_User::find('all');
		$data['students'] = Model_Student::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/cron_message', $data);
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
	


	//START DEAN CREATION
	public function action_create_dean($id = null){
		$data['dean'] = Model_User::find($id); 
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
						'dean_id' => $id,

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

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create_dean', $data);

	}
	//END DEAN CREATION



	//START PARENT CREATION
	public function action_create_parent($id = null){
		$data['student'] = Model_User::find($id); 
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
					$newuser->parent_student = Model_Studparent::forge(array(
						'student_id'=> $id,
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

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create_parent', $data);

	}
	//END PARENT CREATION


	//BEGIN EXIST PARENT CREATION
	public function action_create_exist_parent($id = null){
		$data->programs = Model_Program::find('all');
		$data->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'program_description', 'program_description'));
		$data['student'] = Model_User::find($id); 
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
					$newuser->parent_student = Model_Studparent::forge(array(
						'student_id'=> $id,
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

		$this->template->title = "Users";
		$data->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'program_description', 'program_description'));
		$this->template->content = View::forge('admin/users/create_exist_parent', $data);

	}
	//END EXIST PARENT CREATION

//BEGIN BASIC EDUCATION STUDENT CREATION
	public function action_create_basic_student(){
		$view = View::forge('admin/users/create_basic_student');
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
					'mobile_number'=> 63 . Input::post('mobile_number'),
					'group'=> Input::post('group'),
					'email'=> Input::post('email'),
					'scholarship_type' => Input::post('scholarship_type'),
					'role'=> Input::post('role'),
				));
				$newuser->student = Model_Student::forge(array(
					'program' =>Input::post('year'),
					'year' =>Input::post('year'),
					'tuition_fee' => 0,
					'other_fees' => 0,
					'misc' => 0,
					'down_payment' => 0,
					'breakdown' => 0,
					'balance' => 0,
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
		$view->set_global('basicprograms', Arr::assoc_to_keyval(Model_Basicprogram::find('all'), 'id', 'basic_program_description'));
		$this->template->title= "Users";
		$this->template->content = $view ;

	}
	//END BASIC EDUCATION STUDENT CREATION

	//START STUDENT CREATION
	public function action_create_student(){
		$view = View::forge('admin/users/create_student');
 		$view->programs = Model_Program::find('all');
		if (Input::method() == 'POST')
		{  	

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
					'scholarship_type' => Input::post('scholarship_type'),
					'role'=> Input::post('role'),
				));
				

				$newuser->student = Model_Student::forge(array(
					'program' =>Input::post('program'),
					'year' =>Input::post('year'),
					'tuition_fee' => 0,
					'other_fees' => 0,	
					'misc' => $amount,
					'down_payment' => 0,
					'breakdown' => 0,
					'balance' => 0,
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
		if ($user = Model_User::find($id))
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
