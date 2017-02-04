<?php 	
class Model_Student extends \Orm\Model_Soft
{

	protected static $_properties = array(
		'id',
		'program',
		'year',
		'semester',
		'student_id',
		'scholarship_id',
		'total_assessment',
		'tuition_fee',
		'misc',
		'down_payment',
		'breakdown',
		'dis_tuition',
		'dis_misc',
		'balance',
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
			'key_from' => 'student_id',
			'key_to'   => 'id',
			'cascade_delete' => true,
		),
		// 'parent_user' => array(
		// 	'model_to' => 'Model_User',
		// 	'key_from' => 'parent_id',
		// 	'key_to'   => 'id',
		// 	'cascade_delete' => false,
		// ),
	);
	protected static $_has_many = array(

		'history' => array(
			'model_to' => 'Model_Studhistorie',
			'key_from' => 'id',
			'key_to' => 'studenthistory_id',
			'cascade_delete' => true,
			'cascade_save' => true,
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
		$val->add_field('program', 'Program', 'required|max_length[50]');
		$val->add_field('year', 'Year', 'required|max_length[255]');
		$val->add_field('semester', 'Semester', 'required|max_length[255]');
		$val->add_field('student_id', 'Student_id',  'required|valid_string[numeric]');
		$val->add_field('scholarship_id', 'Scholarship',  'required|valid_string[numeric]');
		$val->add_field('total_assessment', 'Total Assessment', 'valid_string[float]');
		$val->add_field('tuition_fee', 'Tuition Fee', 'valid_string[float]');
		$val->add_field('misc', 'Miscellaneous',  'valid_string[float]');
		$val->add_field('down_payment', 'Down Payment',  'valid_string[float]');
		$val->add_field('breakdown', 'Breakdown',  'valid_string[float]');
		$val->add_field('dis_tuition', 'Tuition Discount',  'valid_string[float]');
		$val->add_field('dis_misc', 'Miscellaneous Discount',  'valid_string[float]');
		$val->add_field('balance', 'Balance',  'valid_string[float]');
		return $val;
	}
}
