<?php
class Controller_Admin_Deans extends Controller_Admin
{

	public function action_index()
	{
		$view = View::forge('admin/deans/index');
		$view->programs = Model_Program::find('all');
		$view->progdeans = Model_Progdean::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;	
	}
	
}
