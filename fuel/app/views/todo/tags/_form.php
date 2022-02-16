<?php use Fuel\Core\Html; ?>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Tag', 'tag', array('class'=>'control-label')); ?>

				<?php echo Form::input('tag', Input::post('tag', isset($todo_tag) ? $todo_tag->tag : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tag')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Created user', 'created_user', array('class'=>'control-label')); ?>

				<?php echo Form::input('created_user', Input::post('created_user', isset($todo_tag) ? $todo_tag->created_user : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Created user')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Updated user', 'updated_user', array('class'=>'control-label')); ?>

				<?php echo Form::input('updated_user', Input::post('updated_user', isset($todo_tag) ? $todo_tag->updated_user : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Updated user')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>