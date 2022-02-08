<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($user) ? $user->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Created user', 'created_user', array('class'=>'control-label')); ?>

				<?php echo Form::input('created_user', Input::post('created_user', isset($user) ? $user->created_user : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Created user')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated user', 'updated_user', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_user', Input::post('updated_user', isset($user) ? $user->updated_user : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated user')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>