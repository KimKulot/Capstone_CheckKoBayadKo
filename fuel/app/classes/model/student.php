<?php
class Model_Student extends \Orm\Model
{
	protected static $_belongs_to = array('user');
	protected static $_has_many = array('students');

	protected static $_properties = array(
		'id',
		'course',
		'student_id',
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
		$val->add_field('course', 'Course', 'required|max_length[50]');

		return $val;
	}

}
