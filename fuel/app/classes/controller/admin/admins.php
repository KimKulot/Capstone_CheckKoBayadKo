8<?php
class Controller_Admin_Admins extends Controller_Admin
{

	public function action_index()
	{
		$view = View::forge('admin/admins/index_course');
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
	public function action_view($program_description = null)
	{	

			$data ['programs'] = DB::select('*')->from('programs')->where('program_description','=', $program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Programs";
			$this->template->content = View::forge('admin/admins/view', $data);
	}
	public function action_index_student()
	{	
		$view = View::forge('admin/admins/index');
		$view->basicprograms = Model_Basicprogram::find('all');
		$view->users = Model_User::find('all');
		$view->students = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = $view;	
	}
	
}
