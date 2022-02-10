<?php

namespace Fuel\Migrations;

class Create_todos
{
	public function up()
	{
		\DBUtil::create_table('todos', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'title' => array('constraint' => 200, 'null' => false, 'type' => 'varchar'),
			'comment' => array('null' => false, 'type' => 'text'),
			'state' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'due_date' => array('null' => false, 'type' => 'timestamp'),
			'created_user' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_user' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'created_at' => array('null' => false, 'type' => 'date'),
			'updated_at' => array('null' => false, 'type' => 'date'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('todos');
	}
}