<h2>Viewing <span class='muted'>#<?php echo $user->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $user->name; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $user->password; ?></p>
<p>
	<strong>Created user:</strong>
	<?php echo $user->created_user; ?></p>
<p>
	<strong>Updated user:</strong>
	<?php echo $user->updated_user; ?></p>

<?php echo Html::anchor('users/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('users', 'Back'); ?>