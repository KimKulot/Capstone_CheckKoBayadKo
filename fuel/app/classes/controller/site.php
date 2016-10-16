<?php

class Controller_Site extends Controller_Base
{
	public $template = 'site/template';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Site' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				if ( ! Auth::member(1))
				{
					Session::set_flash('error', e('You don\'t have access to the site panel'));
					Response::redirect('/admin');
				}
			}
			else
			{
				Response::redirect('site/login');
			}
		}
	}

	public function action_login()
	{
		// Already logged in
		Auth::check() and Response::redirect('site');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{
				if ( ! Auth::check())
				{
					if (Auth::login(Input::post('email'), Input::post('password')))
					{
						// assign the user id that lasted updated this record
						foreach (\Auth::verified() as $driver)
						{
							if (($id = $driver->get_user_id()) !== false)
							{
								// credentials ok, go right in
								$current_user = Model\Auth_User::find($id[1]);
								Session::set_flash('success', e('Welcome, '.$current_user->username));
								if($current_user->role == 8)
								{
									Response::redirect('site');
								}elseif($current_user->role == 9)
								{
									Response::redirect('site/index_parent');
								} else {
									Response::redirect('admin');
								}
								
								
							} 
						}
					}
					else
					{
						$this->template->set_global('login_error', 'Login failed!');
					}
				}
				else
				{
					$this->template->set_global('login_error', 'Already logged in!');
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('site/login',  array('val' => $val), false);
	}

	/**
	 * The logout action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('site');
	}

	/**
	 * The index action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_index($id = null)
	{
		// $view['histories'] = Model_Studhistorie::find('all');
		// $view ['histories'] = DB::select('*')->from('studhistories')->order_by('id','desc')->as_object()->execute();
		// $view['users'] = DB::select('*')->from('users')->where(,'like', "%$search%")->as_object()->execute();
		
		//START CHECK IF BASIC EDUCATION STUDENT 
		$user_id = Auth::get('id');
		$basic['basicstudents'] = Model_Student::find('all', [
			'where' => [
				['student_id', 'like', "$user_id"]
			]
		]);

		// if(count($basic['basicstudents']))
		foreach ($basic['basicstudents'] as $basicstud) {

			$basic['basicprograms'] = Model_Basicprogram::find('all', [
				'where' => [
					['basic_program_description', 'like', "$basicstud->program"]
				]
			]);
		}
		$count_exist_basicprogram = count($basic['basicprograms']);
		if($count_exist_basicprogram > 0){
			Response::redirect('site/index_basic');
		}
		//END CHECK IF BASIC EDUCATION STUDENT 
		die;
		$basic['basicprograms'] = Model_Basicprogram::find('all');
		$view['dates'] = DB::select('date_time')->from('accountantcrons')->order_by('id','desc')->limit(1)->as_object()->execute();
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
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('site/dashboard', $view);
	}

	public function action_index_basic($id = null)
	{
		// $view['histories'] = Model_Studhistorie::find('all');
		// $view ['histories'] = DB::select('*')->from('studhistories')->order_by('id','desc')->as_object()->execute();
		// $view['users'] = DB::select('*')->from('users')->where(,'like', "%$search%")->as_object()->execute();
		$view['dates'] = DB::select('date_time')->from('accountantcrons')->order_by('id','desc')->limit(1)->as_object()->execute();
		$view['misc'] = Model_Basicmiscellanou::find('all');
		$view['programs'] = Model_Basicprogram::find('all');
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
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('site/index_basic', $view);
	}

	public function action_index_parent($id = null)
	{
		$view['dates'] = DB::select('date_time')->from('accountantcrons')->order_by('id','desc')->limit(1)->as_object()->execute();
		$view['studparents'] = Model_Studparent::find('all');
		$view['users'] = Model_User::find('all');
		$view['students'] = Model_Student::find('all');
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('site/index_parent', $view);
	}

}

/* End of file admin.php */
