<?php
class Model_Studhistorie extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'program_description',
		'studenthistory_id',
		'total_assessment',
		'tuition_fee',
		'misc',
		'down_payment',
		'payment',
		'breakdown',
		'dis_misc',
		'dis_tuition',
		'balance',
		'date_time',
		'created_at',
		'updated_at',
		'deleted_at',

	);
	protected static $_soft_delete_column = 'deleted_at';
    protected static $_mysql_timestamp = false; 

	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'studenthistory_id',
			'key_to'   => 'id',
			'cascade_delete' => false,
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
		$val->add_field('program_description', 'Program Description', 'required|max_length[255]');
		$val->add_field('studenthistory_id', 'Studenthistory_id',  'required|valid_string[numeric]');
		$val->add_field('total_assessment', 'Total Assessment', 'valid_string[float]');
		$val->add_field('tuition_fee', 'Tuition Fee',  'valid_string[float]');
		$val->add_field('misc', 'Miscellaneous',  'valid_string[float]');
		$val->add_field('down_payment', 'Down Payment',  'valid_string[float]');
		$val->add_field('payment', 'Payment',  'valid_string[float]');
		$val->add_field('breakdown', 'Breakdown',  'valid_string[float]');
		$val->add_field('balance', 'Balance',  'valid_string[float]');
		$val->add_field('date_time', 'Date Time', 'required|max_length[255]');
		
		return $val;
	}

}
