<?php use Fuel\Core\Form; ?>
<?php use Fuel\Core\Input; ?>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($todo) ? $todo->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Comment', 'comment', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('comment', Input::post('comment', isset($todo) ? $todo->comment : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Comment')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('State', 'state', array('class'=>'control-label')); ?>

				<?php echo Form::input('state', Input::post('state', isset($todo) ? $todo->state : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'State')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Due date', 'due_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('due_date', Input::post('due_date', isset($todo) ? $todo->due_date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Due date', 'type' => 'date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>