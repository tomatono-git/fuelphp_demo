<?php

namespace Fuel\Migrations;

class Initialize_All
{
	public function up()
	{
        // migration テーブルを作成
        query_from_file(__DIR__.DS.'001_1_create_migration.sql');
        // 認証関連のテーブルを作成
        query_from_file(__DIR__.DS.'001_2_create_auth.sql');
        // アプリのテーブルを作成
        query_from_file(__DIR__.DS.'001_3_create_app_all.sql');

        \DB::query('SET search_path TO "$user", public')->execute();
	}

	public function down()
	{
        // 全てのビューを削除
        $views = \DB::select('table_name')
            ->from('information_schema.views')
            ->where('table_schema', '=', 'public')
            ->execute()
            ->as_array(null, 'table_name');
        foreach ($views as $view) {
            \DB::query("DROP VIEW public.\"$view\"")->execute();
        }

        // migration以外のテーブルを削除
        $tables = \DB::select('table_name')
            ->from('information_schema.tables')
            ->where('table_schema', '=', 'public')
            ->where('table_name', '<>', 'migration')
            ->execute()
            ->as_array(null, 'table_name');
        foreach ($tables as $table) {
            \DB::query("DROP TABLE public.\"$table\"")->execute();
        }

        // ユーザー定義型を削除
        $types = \DB::select('user_defined_type_name')
            ->from('information_schema.user_defined_types')
            ->where('user_defined_type_schema', '=', 'public')
            ->execute()
            ->as_array(null, 'user_defined_type_name');
        foreach ($types as $type) {
            \DB::query("DROP TYPE public.\"$type\"")->execute();
        }
	}

    /**
     * SQLファイルを実行
     *
     * @param [string] $file_path ファイルパス
     * @return void
     */
    private function query_from_file($file_path)
    {
        // SQLファイル読み込み
        $dump = file_get_contents($file_path);

        $lines = [];
        foreach (explode("\n", $dump) as $line) {
            $line = trim($line);

            if (empty($line) || strncmp($line, '--', 2) === 0) {
                // 空行とコメントは除外
                continue;
            }

            $lines[] = $line;

            
            if (substr($line, -1) === ';') { // 末尾がセミコロンの場合
                // SQL実行
                \DB::query(implode(' ', $lines))->execute();
                $lines = [];
            }
        }
    }

}