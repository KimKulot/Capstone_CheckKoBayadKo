<?php

namespace Fuel\Migrations;

class Create_ausers
{
	public function up()
	{
		\DBUtil::create_table('ausers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'firstname' => array('constraint' => 255, 'type' => 'varchar'),
			'middlename' => array('constraint' => 255, 'type' => 'varchar'),
			'lastname' => array('constraint' => 255, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'phoneno' => array('constraint' => 11, 'type' => 'int'),
			'role_ID' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('ausers');
	}
}