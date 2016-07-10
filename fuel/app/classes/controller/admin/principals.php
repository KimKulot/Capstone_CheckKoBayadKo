<?php
class Controller_Admin_Principals extends Controller_Admin
{

	public function action_index()
	{
		$view = View::forge('admin/principals/index_basic');
		$view->programs = Model_Basicprogram::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Course";
		$this->template->content = $view;
	}

	public function action_index_student()
	{	
		$view = View::forge('admin/principals/index');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;	
	}	
}
