<?php 	
class Model_Progdean extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'program_id',
		'dean_id',
		'created_at',
		'updated_at',
	);

	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
			'key_from' => 'dean_id',
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
		$val->add_field('program_id', 'Program id',  'required|valid_string[numeric]');
		$val->add_field('dean_id', 'Dean id',  'required|valid_string[numeric]');
		return $val;
	}
}
