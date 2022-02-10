<h2>Viewing <span class='muted'>#<?php echo $todo->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $todo->title; ?></p>
<p>
	<strong>Comment:</strong>
	<?php echo $todo->comment; ?></p>
<p>
	<strong>State:</strong>
	<?php echo $todo->state; ?></p>
<p>
	<strong>Due date:</strong>
	<?php echo $todo->due_date; ?></p>
<p>
	<strong>Created user:</strong>
	<?php echo $todo->created_user; ?></p>
<p>
	<strong>Updated user:</strong>
	<?php echo $todo->updated_user; ?></p>

<?php echo Html::anchor('todos/edit/'.$todo->id, 'Edit'); ?> |
<?php echo Html::anchor('todos', 'Back'); ?>