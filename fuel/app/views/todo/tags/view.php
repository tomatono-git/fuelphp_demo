<?php use Fuel\Core\Html; ?>

<h2>Viewing <span class='muted'>#<?php echo $todo_tag->id; ?></span></h2>

<p>
	<strong>Tag:</strong>
	<?php echo $todo_tag->tag; ?></p>
<p>
	<strong>Created user:</strong>
	<?php echo $todo_tag->created_user; ?></p>
<p>
	<strong>Updated user:</strong>
	<?php echo $todo_tag->updated_user; ?></p>

<?php echo Html::anchor('todo/tags/edit/'.$todo_tag->id, 'Edit'); ?> |
<?php echo Html::anchor('todo/tags', 'Back'); ?>