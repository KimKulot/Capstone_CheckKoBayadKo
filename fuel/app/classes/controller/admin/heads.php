<?php
class Controller_Admin_Heads extends Controller_Admin
{

	public function action_index()
	{
		$id = Auth::get('id');
		$data['progheads'] = Model_Proghead::find('all', [
			'where' => [
				['user_id', 'like', "$id"]
			]
		]);
		$data ['users'] = Model_User::find('all');
		$data['programs'] = Model_Program::find('all');
		$data['students'] = Model_Student::find('all');
 		$this->template->title = "Programs";	
		$this->template->content = View::forge('admin/progheads/index', $data);

		// $view = View::forge('admin/deans/index');
		// $view->programs = Model_Program::find('all');
		// $view->progdeans = Model_Progdean::find('all');
		// $view->users = Model_User::find('all');
		// $view->students = Model_Student::find('all');
		// $this->template->title = "Students";
		// $this->template->content = $view;	
	}

	
}
