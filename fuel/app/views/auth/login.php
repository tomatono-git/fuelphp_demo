<!-- <h2>ログイン</h2> -->

<?php use Fuel\Core\Form; ?>
<?php use Fuel\Core\Input; ?>
<?php use Fuel\Core\Html; ?>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
	<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>
			<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>
			<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'ログイン', array('class' => 'btn btn-primary')); ?>
			<?php echo Html::anchor('auth', '戻る', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
