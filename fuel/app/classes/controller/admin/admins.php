<?php
class Controller_Admin_Admins extends Controller_Admin
{

	public function action_index()
	{
		
		
		// $data['users'] = DB::select('*')->from('users')->where('username','=', $search)->as_object()->execute();
		// $data['course_total']= DB::select( COUNT('id')->from('students')->where('course', '=', 'BSIT')->as_object()->execute();
		// if(count($data->users) == 'BSIT'){
		// }
		// $view->lasthistories = DB::select('distinct', 'city')->from('studhistories')->order_by('id','desc')->limit(1)->as_object()->execute();

		// foreach ($view->program_courses as $course) {
		// 	$view->program_id = DB::select('id')->from('students')->where('course', '=', $course->program_description)->as_object()->execute();
		// 	foreach ($view->program_id as $id) {
		// 		$dd->progs = DB::select('program_description')->from('studhistories')->where('studenthistory_id', '=', $id->id)->as_object()->execute();
		// 		foreach ($dd->progs as $prog) {
		// 			$pp->progers = DB::select()->from('studhistories')->where('program_description', '=', '$course->program_description')->order_by('id','desc')->as_object()->execute();var_dump($dd);
		// 		}
				
		// 	}
		// }
		// var_dump($course);
		// 	$dd = 3->order_by('id','desc')->as_object()->execute();
		// 	var_dump($dd);


		$view ['programs'] = Model_Program::find('all');

		// foreach ($view ['programs'] as $program) {
		// 	$view ['pros'] = DB::select(DB::expr('MAX(date_time) as lastdate'),'program_description')->from('studhistories')->where('program_description', '=', $program->program_description)->as_object()->execute();
			
		// }
		$view ['users'] = Model_User::find('all');
		$view ['students'] = Model_Student::find('all');
		$this->template->title = "Course";
		$this->template->content = View::forge('admin/admins/index_course', $view);
	}

	public function action_basic_index()
	{
		$view['basicprograms'] = Model_Basicprogram::find('all');
		$view['users'] = Model_User::find('all');
		$view['students'] = Model_Student::find('all');
		$this->template->title = "Basic Program";
		$this->template->content = View::forge('admin/admins/index', $view);
	}

	public function action_view($program_description = null)
	{	

			$data ['programs'] = DB::select('*')->from('programs')->where('program_description','=', $program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Programs";
			$this->template->content = View::forge('admin/admins/view', $data);
	}


	public function action_view_basic($basic_program_description = null)
	{	

			$data ['basicprograms'] = DB::select('*')->from('basicprograms')->where('basic_program_description','=', $basic_program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Basic Education Programs";
			$this->template->content = View::forge('admin/admins/view_basic', $data);
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
