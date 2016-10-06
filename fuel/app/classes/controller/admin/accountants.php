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
	public function action_send_test()
	{
		$view = View::forge('admin/accountants/send_test');
		$this->template->title = "TEST SMS";
		$this->template->content = $view;
	}
	
	public function action_view_basic($basic_program_description = null)
	{	

			$data ['basicprograms'] = DB::select('*')->from('basicprograms')->where('basic_program_description','=', $basic_program_description)->as_object()->execute();
			$data ['users'] = Model_User::find('all');
			$data ['students'] = Model_Student::find('all');
			$this->template->title = "Basic Education Programs";
			$this->template->content = View::forge('admin/accountants/view_basic', $data);
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
	
	public function action_index_scholarship()
	{
		$view = View::forge('admin/accountants/index_scholarship');
		$view->scholarships = Model_Scholarship::find('all');
		$this->template->title = "Scholarship";
		$this->template->content = $view;
	}

	//START SCHOLARSHIP CREATION
	public function action_create_scholarship(){
		$view = View::forge('admin/accountants/create_scholarship');
		$view->scholars = Model_Scholarship::find('all');
		if (Input::method() == 'POST')
		{
			$val = Model_Scholarship::validate('create');

			
				if ($val->run())
				{
					$newscholar = Model_Scholarship::forge(array(
						'scholarship_provider'=> Input::post('scholarship_provider'),
						'category' =>Input::post('category'),
						'description'=> Input::post('description'),
					));
					
					if($newscholar->save()){
						Session::set_flash('success', e('Added scholarship'));
					 	Response::redirect('admin/accountants/index_scholarship');
				}
			 }
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = $view;

	}
	//END SCHOLARSHIP CREATION

	public function action_edit_scholar($id = null)
	{
		$view = View::forge('admin/accountants/edit_scholarship');
		$scholar = Model_Scholarship::find($id);
		$val = Model_Scholarship::validate('edit');

		if ($val->run())
		{
			$scholar->scholarship_provider = Input::post('scholarship_provider');
			$scholar->category = Input::post('category');
			$scholar->description = Input::post('description');

			if ($scholar->save())
			{
				Session::set_flash('success', e('Updated scholarship #' . $id));

				Response::redirect('admin/accountants/index_scholarship');
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
				$scholar->scholarship_provider = Input::post('scholarship_provider');
				$scholar->category = Input::post('category');
				$scholar->description = Input::post('description');

				Session::set_flash('error', $val->error());
			}
			$this->template->set_global('scholars', $scholar, false);
		}

		$this->template->title = "Scholarship";
		$this->template->content = $view;

	}

}
