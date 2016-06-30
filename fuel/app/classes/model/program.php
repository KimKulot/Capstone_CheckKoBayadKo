<?php
class Model_Program extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'program_description',
		'created_at',
		'updated_at',

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
		$val->add_field('program_description', 'Program', 'required|max_length[50]');
		return $val;
	}

}
