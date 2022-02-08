<?php

namespace Fuel\Migrations;

class Initialize_All
{
	public function up()
	{
        // SQLファイル読み込み
        $dump = file_get_contents(__DIR__.DS.'001_initialize_all.sql');

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
	}
}