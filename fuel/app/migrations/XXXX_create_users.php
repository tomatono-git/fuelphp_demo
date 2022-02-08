<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		// \DBUtil::create_table('users', array(
		// 	'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
		// 	'name' => array('constraint' => 100, 'null' => false, 'type' => 'varchar'),
		// 	'email' => array('constraint' => 200, 'null' => false, 'type' => 'varchar'),
		// 	'password' => array('constraint' => 200, 'null' => false, 'type' => 'varchar'),
		// 	'created_user' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		// 	'updated_user' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		// 	'created_at' => array('null' => false, 'type' => 'date'),
		// 	'updated_at' => array('null' => false, 'type' => 'date'),
		// ), array('id'));
	}

	public function down()
	{
		// \DBUtil::drop_table('users');
	}
}