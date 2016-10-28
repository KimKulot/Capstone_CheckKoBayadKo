<?php
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
			$val = Model_User::validate('create');
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
					'send_at' => Input::post('send_at'),
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

		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'program_description', 'program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}