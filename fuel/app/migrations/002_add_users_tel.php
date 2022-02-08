<?php

namespace Fuel\Migrations;

class Add_users_tel
{
	public function up()
	{
		\DB::query('ALTER TABLE users ADD COLUMN tel varchar(20)')->execute();
        \DB::query('COMMENT ON COLUMN users.tel IS :comment')->param('comment', '電話番号')->execute();
	}

	public function down()
	{
		\DB::query('ALTER TABLE users DROP COLUMN tel')->execute();
	}
}