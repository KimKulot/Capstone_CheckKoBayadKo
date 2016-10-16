<?php 	
class Model_Basicmiscellanou extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'basic_program_id',
		'type',
		'amount',
	);


	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('basic_program_id', 'Program id',  'required|valid_string[numeric]');
		$val->add_field('type', 'Type', 'required|max_length[50]');
		$val->add_field('amount', 'Amount', 'valid_string[float]');
		return $val;
	}
}
