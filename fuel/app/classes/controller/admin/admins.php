<?php
class Controller_Admin_Admins extends Controller_Admin
{

	public function action_index_course()
	{
		$view = View::forge('admin/admins/index_course');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Course";
		$this->template->content = $view;
	}

	public function action_index()
	{	
		$view = View::forge('admin/admins/index');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;	
	}
	

	
	
}
