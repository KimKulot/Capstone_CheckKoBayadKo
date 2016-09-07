<?php
class Model_User extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'firstname',
		'middlename',
		'lastname',
		'mobile_number',
		'group',
		'email',
		'scholarship_type',
		'role',
		'created_at',
		'updated_at',
		'deleted_at',
		// 'deleted',

	);
	
	protected static $_soft_delete_column = 'deleted_at';
    protected static $_mysql_timestamp = false; 


	protected static $_has_one = array(
		'student' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'id',
			'key_to' => 'student_id',
			'cascade_delete' => true,
			'cascade_save' => true,
		),
		'parent_student' => array(
			'model_to' => 'Model_Studparent',
			'key_from' => 'id',
			'key_to' => 'parent_id',
			'cascade_delete' => true,
			'cascade_save' => true,
		),
		'dean_program' => array(
			'model_to' => 'Model_Progdean',
			'key_from' => 'id',
			'key_to' => 'dean_id',
			'cascade_delete' => true,
			'cascade_save' => true,
		),

	);

	
	
	
	

	// public function get_full_name () {
	// 	return $this->'firstname' . ' ' . $this->'lastname';
	// 	static::method_exists(object, method_name());
	// }
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('username', 'Username', 'required|max_length[50]');
		$val->add_field('password', 'Password', 'required|max_length[255]');
		$val->add_field('firstname', 'Firstname', 'required|max_length[50]');
		$val->add_field('middlename', 'Middlename', 'required|max_length[255]');
		$val->add_field('lastname', 'Lastname', 'required|max_length[255]');
		$val->add_field('mobile_number', 'Mobile Number', 'required|valid_string[numeric]');
		$val->add_field('group', 'Group', 'required|valid_string[numeric]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('scholarship_type', 'Scholarship Type', 'required|max_length[150]');
		$val->add_field('role', 'Role', 'required|valid_string[numeric]');
		return $val;
	}

}












