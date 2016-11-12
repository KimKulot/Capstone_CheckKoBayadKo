<?php
class Controller_Admin_Principals extends Controller_Admin
{

	public function action_index()
	{
		$view = View::forge('admin/principals/index_basic');
		$view->programs = Model_Basicprogram::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Basic Program";
		$this->template->content = $view;
	}

	public function action_index_student($basic_program_description = null)
	{	
		$data ['basicprograms'] = DB::select('*')->from('basicprograms')->where('basic_program_description','=', $basic_program_description)->as_object()->execute();
		$data ['users'] = Model_User::find('all');
		$data ['students'] = Model_Student::find('all');
		$this->template->title = "Basic Education Programs";
		$this->template->content = View::forge('admin/principals/view_basic', $data);	
	}	
}
