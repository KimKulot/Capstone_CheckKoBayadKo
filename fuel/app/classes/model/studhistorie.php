<?php
class Model_Studhistorie extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'program_description',
		'studenthistory_id',
		'tuition_fee',
		'misc',
		'other_fees',
		'down_payment',
		'payment',
		'breakdown',
		'balance',
		'date_time',
		'created_at',
		'updated_at',

	);

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
		$val->add_field('tuition_fee', 'Tuition Fee',  'floatval(valid_string[float])');
		$val->add_field('misc', 'Miscellaneous',  'floatval(valid_string[float])');
		$val->add_field('other_fees', 'Other Fees',  'floatval(valid_string[float])');
		$val->add_field('down_payment', 'Down Payment',  'floatval(valid_string[float])');
		$val->add_field('payment', 'Payment',  'floatval(valid_string[float])');
		$val->add_field('breakdown', 'Breakdown',  'floatval(valid_string[float])');
		$val->add_field('balance', 'Balance',  'floatval(valid_string[float])');
		$val->add_field('date_time', 'Date Time', 'required|max_length[255]');
		return $val;
	}

}
