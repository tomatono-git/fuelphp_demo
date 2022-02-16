<?php use Fuel\Core\Html; ?>

<h2>Editing <span class='muted'>Todo_tag</span></h2>
<br>

<?php echo render('todo/tags/_form'); ?>
<p>
	<?php echo Html::anchor('todo/tags/view/'.$todo_tag->id, 'View'); ?> |
	<?php echo Html::anchor('todo/tags', 'Back'); ?></p>
