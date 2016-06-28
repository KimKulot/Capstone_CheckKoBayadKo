<?php 	
class Model_Student extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'course',
		'user_id',
		'created_at',
		'updated_at',
	);

	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
			'key_from' => 'user_id',
			'key_to'   => 'id',
			'cascade_delete' => false,
		),
	);


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
		$val->add_field('course', 'Course', 'required|max_length[50]');
		$val->add_field('user_id', 'User_id',  'required|valid_string[numeric]');
		return $val;
	}
}
