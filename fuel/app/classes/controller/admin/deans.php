<?php
class Controller_Admin_Deans extends Controller_Admin
{

	public function action_index()
	{
		$id = Auth::get('id');
		$data['progdeans'] = Model_Progdean::find('all', [
			'where' => [
				['user_id', 'like', "$id"]
			]
		]);
		$data ['users'] = Model_User::find('all');
		$data['programs'] = Model_Program::find('all');
		$data['students'] = Model_Student::find('all');
 		$this->template->title = "Programs";	
		$this->template->content = View::forge('admin/deans/index', $data);

		// $view = View::forge('admin/deans/index');
		// $view->programs = Model_Program::find('all');
		// $view->progdeans = Model_Progdean::find('all');
		// $view->users = Model_User::find('all');
		// $view->students = Model_Student::find('all');
		// $this->template->title = "Students";
		// $this->template->content = $view;	
	}

	public function action_view()
	{	
// 		//
// 		select distinct on field1 *
// 		from table
// DB::select('')->from('progdeans')->distinct(true)->as_object()->execute();
		// DB::select('id','name')->from 0 ('users')->execute();
		$data['progdeans'] = Model_Progdean::find('all', [
			'group_by' => ['user_id']
		]);

		// var_dump($data['progdeans']);die;
		$data ['users'] = Model_User::find('all');
		$data['programs'] = Model_Program::find('all');
		$this->template->title = "Programs";
		$this->template->content = View::forge('admin/deans/view', $data);
	}

	public function action_view_proghead()
	{	
		$data['progheads'] = Model_Proghead::find('all');
		$data ['users'] = Model_User::find('all');
		$data['programs'] = Model_Program::find('all');
		$this->template->title = "Programs";
		$this->template->content = View::forge('admin/deans/view_proghead', $data);
	}

	public function action_view_progdean_student($id = null)
	{	

		$data['progdeans'] = Model_Progdean::find('all', [
			'where' => [
				['user_id', 'like', "$id"]
			]
		]);
		$data ['users'] = Model_User::find('all');
		$data['programs'] = Model_Program::find('all');
		$data['students'] = Model_Student::find('all');
 		$this->template->title = "Programs";
		$this->template->content = View::forge('admin/deans/view_progdean_student', $data);
	}

	public function action_view_proghead_student($id = null)
	{	
		$data['progheads'] = Model_Proghead::find('all', [
			'where' => [
				['user_id', 'like', "$id"]
			]
		]);
		$data ['users'] = Model_User::find('all');
		$data['programs'] = Model_Program::find('all');
		$data['students'] = Model_Student::find('all');
		$this->template->title = "Programs";
		$this->template->content = View::forge('admin/deans/view_proghead_student', $data);
	}


	//START PARENT CREATION
	public function action_create_dean_program($id = null){
		
		$view = View::forge('admin/deans/create_dean_program');
		// $view->users =Model_User::find($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Progdean::validate('create');

			// END CHECK IF USER FIRSTNAME AND LASTNAME IS EXISTING CONDITION
			if ($val->run())
			{
				$newuser = Model_Progdean::forge(array(
					'program_id' => Input::post('program'),
					'user_id'=> $id,
				));
				if($newuser->save()){
					Session::set_flash('success', e('Added user'));
				 	Response::redirect('admin/deans/view_progdean_student/' . $id);
				}
				
			 }else{
				Session::set_flash('error', $val->error());
			}
		}
		$view->set_global('programs', Arr::assoc_to_keyval(Model_Program::find('all'), 'id', 'program_description'));
		$this->template->title = "Users";
		$this->template->content = $view;

	}
	//END PARENT CREATION
	
}
