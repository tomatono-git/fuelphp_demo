<?php use Fuel\Core\Html; ?>

<h2>New <span class='muted'>Todo</span></h2>
<br>

<?php echo render('todos/_form'); ?>


<p><?php echo Html::anchor('todos', 'Back'); ?></p>
