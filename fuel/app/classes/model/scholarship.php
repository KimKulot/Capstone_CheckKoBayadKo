<?php
class Model_Scholarship extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'scholarship_provider',
		'category',
		'dis_misc',
		'dis_tuition',
		'deleted_at',
	);
	
	protected static $_soft_delete_column = 'deleted_at';
    protected static $_mysql_timestamp = false; 

    public function &__get($name)
	{
		if ($name == 'scholarship') {
			$var =  $this->scholarship_provider . ' ' . $this->category;
			return $var;
		}

		return parent::__get($name);
	}

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('scholarship_provider', 'Scholarship Provider', 'required|max_length[100]');
		$val->add_field('category', 'Category', 'required|max_length[100]');
		$val->add_field('dis_misc', 'Miscellaneous Discount', 'required|valid_string[numeric]');
		$val->add_field('dis_tuition', 'Tuition Fee Discount', 'required|valid_string[numeric]');
		return $val;
	}

}












