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
		'role',
		'image',
		'created_at',
		'updated_at',
		'send_at',
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
			'cascade_delete' => false,
			'cascade_save' => true,
		),
		'parent_student' => array(
			'model_to' => 'Model_Studparent',
			'key_from' => 'id',
			'key_to' => 'parent_id',
			'cascade_delete' => false,
			'cascade_save' => true,
		),
		'head_program' => array(
			'model_to' => 'Model_Proghead',
			'key_from' => 'id',
			'key_to' => 'user_id',
			'cascade_delete' => false,
			'cascade_save' => true,
		),
		'dean_program' => array(
			'model_to' => 'Model_Progdean',
			'key_from' => 'id',
			'key_to' => 'user_id',
			'cascade_delete' => false,
			'cascade_save' => true,
		),

	);
		// protected static $_has_one = array(
			
			

		// );
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
		$val->add_field('middlename', 'Middlename', 'max_length[255]');
		$val->add_field('lastname', 'Lastname', 'required|max_length[255]');
		$val->add_field('mobile_number', 'Mobile Number', 'required|valid_string[numeric]');
		$val->add_field('group', 'Group', 'required|valid_string[numeric]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('role', 'Role', 'required|valid_string[numeric]');
		$val->add_field('image', 'Image', 'max_length[250]');
		$val->add_field('send_at', 'Send at', 'valid_string[numeric]');

		return $val;
	}

}












