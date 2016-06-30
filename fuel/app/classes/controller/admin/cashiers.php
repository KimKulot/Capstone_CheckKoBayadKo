<?php
class Controller_Admin_Cashiers extends Controller_Admin
{

	public function action_index()
	{
		//$view->users = Model_User::find('all');
		$view = View::forge('admin/cashiers/index');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;

		// $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	}

	public function action_edit($id = null)
	{
		$student = Model_Student::find($id);
		$val = Model_Student::validate('edit');

		if ($val->run())
		{
			$student->course = Input::post('course');
			$student->tuition_fee = Input::post('tuition_fee');
			$student->misc = Input::post('misc');
			$student->down_payment = Input::post('down_payment');
			$student->breakdown = Input::post('breakdown');
			$student->balance = Input::post('balance');

			if ($student->save())
			{
				Session::set_flash('success', e('Updated student #' . $id));

				Response::redirect('admin/cashiers');
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

}
