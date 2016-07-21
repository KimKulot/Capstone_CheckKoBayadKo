<?php
class Controller_Admin_Accountants extends Controller_Admin
{

	
	public function action_index()
	{	

		$view = View::forge('admin/accountants/index_course');
		$view->programs = Model_Program::find('all');
		// $data['users'] = DB::select('*')->from('users')->where('username','=', $search)->as_object()->execute();
		// $data['course_total']= DB::select( COUNT('id')->from('students')->where('course', '=', 'BSIT')->as_object()->execute();
		// if(count($data->users) == 'BSIT'){
		// }
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Course";
		$this->template->content = $view;
	}

	public function action_view_basic($basic_program_description = null)
	{	

			$data ['basicprograms'] = DB::select('*')->from('basicprograms')->where('basic_program_description','=', $basic_program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Basic Education Programs";
			$this->template->content = View::forge('admin/admins/view_basic', $data);
	}
	public function action_view($program_description = null)
	{	

			$data ['programs'] = DB::select('*')->from('programs')->where('program_description','=', $program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Programs";
			$this->template->content = View::forge('admin/accountants/view', $data);
	}
	public function action_index_student()
	{	
		$view = View::forge('admin/accountants/index');
		$view->basicprograms = Model_Basicprogram::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;	
	}
	
}
