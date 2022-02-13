<?php
use Orm\Model;

class Model_Todo_Tag extends Model
{
	protected static $_properties = array(
		'id',
		'tag',
		'created_user',
		'updated_user',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('tag', 'Tag', 'required|max_length[200]');
		$val->add_field('created_user', 'Created User', 'required|valid_string[numeric]');
		$val->add_field('updated_user', 'Updated User', 'required|valid_string[numeric]');

		return $val;
	}

}
