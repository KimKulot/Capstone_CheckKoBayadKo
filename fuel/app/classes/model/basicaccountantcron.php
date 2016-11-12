<?php
class Model_Basicaccountantcron extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'date_time',
		// 'education_level',
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
		$val->add_field('date_time', 'Date and time', 'required|max_length[50]');
		// $val->add_field('education_level', 'Education Level', 'required|max_length[150]');
		return $val;
	}

}
