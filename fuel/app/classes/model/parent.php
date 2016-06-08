<?php
class Model_Parent extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'parent_id',
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
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('parent_id', 'Parent Id', 'required|valid_string[numeric]');

		return $val;
	}

}
