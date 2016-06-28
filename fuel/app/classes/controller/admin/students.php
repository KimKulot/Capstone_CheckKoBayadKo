<?php
class Controller_Admin_Students extends Controller_Admin
{

	public function action_index()
	{
		//$view->users = Model_User::find('all');
		$view = View::forge('admin/students/index');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;


		// $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	}

	public function action_view($id = null)
	{
		// $data['student'] = Model_Student::find('first', array(
		//     'related' => array(
		//         'articles' => array(
		//             'join_type' => 'inner',
		//             'where' => array(
		//                 array('publish_date', '>', DB::expr(time())),
		//                 array('published', '=', DB::expr(1)),
		//             ),
		//             'order_by' => array('id' => 'desc'),
		//         ),
		//     ),
		// ));

		//$data['student'] = Model_User::find('all', array('related' => array('users')));
		$data['student'] = Model_Student::find($id);
		//$data = Model_Student::find($id);
		// $data['user'] = get_full_name();
		$data['user'] = Model_User::find($id);
		$this->template->title = "User";

		$this->template->content = View::forge('admin/students/view', $data);
 		
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Student::validate('create');

			if ($val->run())
			{
			
				$student = Model_Student::forge(array(
					'course'      => Input::post('course'),
					'user_id'  => Input::post('user_id'),
				));

				if ($student->save())
				{
					Session::set_flash('success', e('Added student'));

					Response::redirect('admin/students');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Students";
		$this->template->content = View::forge('admin/students/create_student');

	}

	public function action_edit($id = null)
	{
		$student = Model_Student::find($id);
		$val = Model_Student::validate('edit');

		if ($val->run())
		{
			$student->course = Input::post('course');
			$student->user_id = Input::post('user_id');
			

			if ($student->save())
			{
				Session::set_flash('success', e('Updated student #' . $id));

				Response::redirect('admin/students');
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
				$student->course = Input::post('course');
				$student->user_id = Input::post('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('student', $student, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/students/edit');

	}

	public function action_delete($id = null)
	{
		if ($student = Model_Student::find($id))
		{
			$student->delete();

			Session::set_flash('success', e('Deleted student #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete student #'.$id));
		}

		Response::redirect('admin/students');

	}

}
