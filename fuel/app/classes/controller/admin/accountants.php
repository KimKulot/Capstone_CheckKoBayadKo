<?php
class Controller_Admin_Accountants extends Controller_Admin
{

	public function action_index()
	{
		$data['accountants'] = Model_Accountant::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/accountants/index', $data);

	}

	public function action_view($id = null)
	{
		$data['accountant'] = Model_Accountant::find($id);

		$this->template->title = "user";
		$this->template->content = View::forge('admin/accountants/view', $data);

	}

	public function action_create()
	{
		$view = View::forge('admin/accountants/create');

		if (Input::method() == 'POST')
		{
			// $val = Model_Accountant::validate('create');

			// if ($val->run())
			// {
				$accountant =  Auth::create_user(
					Input::post('username'),
					Input::post('password'),
					Input::post('email'),
					100,
					array(
						'firstname' => Input::post('firstname'),
						'middlename' => Input::post('middlename'),
						'lastname' => Input::post('lastname'),
						'password' => Input::post('password'),
						'phoneno' => Input::post('phoneno'),
						'role' => Input::post('roleid'),
					)
				);
				// $accountant = Model_Accountant::forge(array(
				// 	'firstname' => Input::post('firstname'),
					// 'middlename' => Input::post('middlename'),
					// 'lastname' => Input::post('lastname'),
					// 'password' => Input::post('password'),
					// 'phoneno' => Input::post('phoneno'),
					// 'role' => Input::post('role_id'),
				// ));

				if ($accountant)
				{
					Session::set_flash('success', e('Added user #'));

					Response::redirect('admin/accountants');
				}

				else
				{
					Session::set_flash('error', e('Could not save accountant.'));
				}
			// }
			// else
			// {
			// 	Session::set_flash('error', $val->error());
			// }
		}
		$view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));

		$this->template->title = "users";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$view = View::forge('admin/accountants/edit');

		// $accountant = Model_Accountant::find($id);
		$val = Model_Accountant::validate('edit');

		// if ($val->run())
		// {
			
			Auth::update_user(
			 array(
			 	 'password'     => $val->validated('password'),
			 	 'old_password'     => $val->validated('oldpassword'),
			 	)
			);
			   //$accountant->password = Input::post('password');
			// $accountant->firstname = Input::post('firstname');
			// $accountant->middlename = Input::post('middlename');
			// $accountant->lastname = Input::post('lastname');
			// $accountant->password = Input::post('password');
			// $accountant->phoneno = Input::post('phoneno');
			// $accountant->role_id = Input::post('role_id');

			if ($accountant)
			{
				Session::set_flash('success', e('Updated user #'));

				Response::redirect('admin/accountants');
			// }

			// else
			// {
			// 	Session::set_flash('error', e('Could not update user #' . $id));
			// }
		 }

		else
		{
			if (Input::method() == 'POST')
			{
				$accountant->firstname = $val->validated('firstname');
				$accountant->middlename = $val->validated('middlename');
				$accountant->lastname = $val->validated('lastname');
				$accountant->password = $val->validated('password');
				$accountant->phoneno = $val->validated('phoneno');
				$accountant->role_id = $val->validated('role_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('accountant', $accountant, false);
		}
		$view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));

		$this->template->title = "users";
		$this->template->content = $view;

	}
	public function action_delete($id = null)
	{
		if ($accountant = Model_Accountant::find($id))
		{
			$accountant->delete();

			Session::set_flash('success', e('Deleted user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete accountant #'.$id));
		}

		Response::redirect('admin/accountants');

	}

}
