<?php 	
class Model_Studparent extends \Orm\Model_Soft
{

	protected static $_properties = array(
		'id',
		'student_id',
		'parent_id',
		'created_at',
		'updated_at',
		'deleted_at',
	);
	protected static $_soft_delete_column = 'deleted_at';
    protected static $_mysql_timestamp = false; 
	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
			'key_from' => 'parent_id',
			'key_to'   => 'id',
			'cascade_delete' => false,
		),
		// 'parent_user' => array(
		// 	'model_to' => 'Model_User',
		// 	'key_from' => 'parent_id',
		// 	'key_to'   => 'id',
		// 	'cascade_delete' => false,
		// ),
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
		$val->add_field('student_id', 'Student_id',  'required|valid_string[numeric]');
		$val->add_field('parent_id', 'Parent_id',  'required|valid_string[numeric]');
		return $val;
	}
}
