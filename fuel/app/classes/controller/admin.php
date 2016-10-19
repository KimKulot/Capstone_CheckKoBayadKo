<?php

class Controller_Admin extends Controller_Base
{
	public $template = 'admin/template';

	public function before()
	{
		parent::before();
		if ((Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action , array('login', 'logout'))) and  (Request::active()->controller != 'Controller_Admin_Users' and Request::active()->action != 'cron_message'))
		{
			if (Auth::check())
			{
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($admin_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
					Response::redirect('/');
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
		Auth::check() and Response::redirect('admin');

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
								Response::redirect('admin');
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
		$this->template->content = View::forge('site/login', array('val' => $val), false);
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
		Response::redirect('admin');
	}

	/**
	 * The index action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('admin/dashboard');
	}

	public function action_upload_image($id = null)
	{

		$val = Model_User::validate('edit');
		$user = Model_User::find($id);

		if (Input::method() == 'POST'){

			// echo $_POST['username'];
			// echo $_POST['password'];
			// echo $_POST['mobile_number'];
			// die;
			$file_img = null; 
			 $config = array(
		    'path' => 'assets/img/uploads',
		    'randomize' => true,
		    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		    );
		    Upload::process($config);
		    if(Upload::is_valid()) {
		    	
		      Upload::save();

		       $file = Upload::get_files(); 
		       // var_dump($file);
		       $id = Auth::get('id');

		    	foreach ($file as $savefile) {
		    	 	
				}
				$file_img = $savefile['saved_as'];
		    	 	
		    }
		    echo $file_img;
		   
		   
		    $data = array();
		    $data['errors'] = '';
		    $ii = 0;
		    foreach(Upload::get_errors() as $file) {
		      $data['errors'][$ii] = $file['errors'];
		      ++$ii;
		    }
		    // if (Auth::get('role') == 9) {
		    // 	Response::redirect('site/index_parent');
		    // }
		    $id = Auth::get('id');
		    $data['users'] = Model_User::find('all', [
				'where' => [
					['id', 'like', "$id"]
				]
			]);
		    foreach ($data['users'] as $user) {
		    	// if ($file_img == null) {
		    	// 	echo "empty";
		    	// }else{
		    	// 	echo "hello";
		    	// }
		    	// die;
		 		if ($file_img == null){
		 			// echo 'hello';
		 			$user->image = $user->image;
	    	 		$user->username = $_POST['username'];
	    	 		$user->password = Auth::instance()->hash_password($_POST['password']);
	    	 		$user->mobile_number = $_POST['mobile_number'];
	    	 		$user->save();
	    	 	
		 		}else{
	    	 		$user->image = $file_img;
	    	 		$user->username = $_POST['username'];
	    	 		$user->password = Auth::instance()->hash_password($_POST['password']);
	    	 		$user->mobile_number = $_POST['mobile_number'];
	    	 		$user->save();
	    	 	}
	    	 	
	    	}
		    Response::redirect('admin');
		}
		$this->template->set_global('user', $user, false);
		$this->template->title = "Upload image";
		$this->template->content = View::forge('admin/upload_image');

	}

}

/* End of file admin.php */
