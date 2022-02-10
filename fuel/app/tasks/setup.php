<?php

// namespace My\Tasks;
namespace Fuel\Tasks;

use Auth\Auth;
use \Model_User;

class Setup
{
	public static function run($speech = null)
	{
        // migration テーブル作成
        self::create_migration_table();
        // migration
        self::migrate();
        // テストユーザー追加
        self::add_user();
	}

    /**
     * migration テーブルを作成
     *
     * @return void
     */
    public static function create_migration_table()
    {
        $sql = <<<EOM
        CREATE TABLE IF NOT EXISTS migration (
            "id" serial,
            "type" varchar(25) NOT NULL,
            "name" varchar(50) NOT NULL,
            "migration" varchar(100) DEFAULT '' NOT NULL
        )
        EOM;

        $query = \DB::query($sql);
        print "migratin テーブルの作成 開始\n";
        $query->execute();
        print "migratin テーブルの作成 終了\n";
    }

    /**
     * migration を実行
     *
     * @return void
     */
    public static function migrate()
    {
        $command = 'php oil refine migrate';
        return self::exec($command);
    }

    /**
     * テストユーザーを追加
     *
     * @return void
     */
    public static function add_user()
    {
        $email = 'test@example.com';
		// テストユーザーを取得
		$user = Model_User::find('first', [
			'where' => [
				['email', $email]
			],
		]);

		if ($user)
		{
            print "ユーザー登録済み！\n";
		}
		else
		{
			// テストユーザーを追加
			Auth::create_user('test_user', 'pass', $email);
		}
    }

    /**
     * テスト
     *
     * @return void
     */
    public static function test()
    {
        $command = 'echo "test1" "test2"';
        return self::exec($command);
    }

    /**
     * コマンド実行
     *
     * @param string $command 実行するコマンド
     * @return bool 成否
     */
    private static function exec(string $command)
    {
        $output = [];
        $result_code = null;
        // コマンド実行
        $result = exec($command, $output, $result_code);
        $success = false;
        if ($result)
        {
            print_r($result_code . "\n");
            print_r($output);
            // 成功
            $success = true;
        }
        else
        {
            // 失敗
            print("Error!\nresult_code=" . $result_code . "\n");
        }

        return $success;
    }
}
