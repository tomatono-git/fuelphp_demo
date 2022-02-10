<h2>Editing <span class='muted'>Todo</span></h2>
<br>

<?php echo render('todos/_form'); ?>
<p>
	<?php echo Html::anchor('todos/view/'.$todo->id, 'View'); ?> |
	<?php echo Html::anchor('todos', 'Back'); ?></p>
