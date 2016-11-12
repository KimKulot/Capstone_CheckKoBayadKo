<?php
class Controller_Admin_Vpaas extends Controller_Admin
{

	public function action_index()
	{
		$view = View::forge('admin/vpaas/index_course');
		$view->programs = Model_Program::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Course";
		$this->template->content = $view;
	}

	public function action_index_student()
	{	
		$view = View::forge('admin/vpaas/index');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;	
	}	

	public function action_basic_index()
	{
		$view['basicprograms'] = Model_Basicprogram::find('all');
		$view['users'] = Model_User::find('all');
		$view['students'] = Model_Student::find('all');
		$this->template->title = "Basic Program";
		$this->template->content = View::forge('admin/vpaas/index_basic', $view);
	}

	public function action_view($program_description = null)
	{	

			$data ['programs'] = DB::select('*')->from('programs')->where('program_description','=', $program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Programs";
			$this->template->content = View::forge('admin/vpaas/view', $data);
	}

	public function action_view_basic($basic_program_description = null)
	{	

			$data ['basicprograms'] = DB::select('*')->from('basicprograms')->where('basic_program_description','=', $basic_program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Programs";
			$this->template->content = View::forge('admin/vpaas/view_basic', $data);
	}

	
}
