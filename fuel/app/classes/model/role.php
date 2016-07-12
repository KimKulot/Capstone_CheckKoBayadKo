<?php 	
class Model_Role extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'role_description',
	);
	

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('role_description', 'Role Description',  'required|max_length[255]');
		return $val;
	}
}
