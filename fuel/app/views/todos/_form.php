<?php use Fuel\Core\Form; ?>
<?php use Fuel\Core\Input; ?>

<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group row">
			<?php echo Form::label('Title', 'title', array('class'=>'col-form-label col-md-2')); ?>
			<div class="col-md-10">
				<?php echo Form::input('title', Input::post('title', isset($todo) ? $todo->title : ''), array('class' => 'form-control', 'placeholder'=>'Title')); ?>
			</div>
		</div>
		<div class="form-group row">
			<?php echo Form::label('Comment', 'comment', array('class'=>'col-form-label col-md-2')); ?>
			<div class="col-md-10">
				<?php echo Form::textarea('comment', Input::post('comment', isset($todo) ? $todo->comment : ''), array('class' => 'form-control', 'rows' => 8, 'placeholder'=>'Comment')); ?>
			</div>
		</div>
		<div class="form-group row">
			<?php echo Form::label('State', 'state', array('class'=>'col-form-label col-md-2')); ?>
			<div class="col-md-10">
				<?php echo Form::input('state', Input::post('state', isset($todo) ? $todo->state : ''), array('class' => 'form-control', 'placeholder'=>'State')); ?>
			</div>
		</div>
		<div class="form-group row">
			<?php echo Form::label('期限', 'due_date', array('class'=>'col-form-label col-md-2')); ?>
			<div class="form-inline col-md-10" style="padding-left:0;">
				<div class="col-md-4">
					<?php echo Form::input('due_date', Input::post('due_date', isset($todo) ? $todo->due_date : ''), array('class' => 'form-control', 'placeholder'=>'期限', 'type' => 'date')); ?>
					<i class="btn btn-primary">×</i>
				</div>

				<?php /* echo Form::label('Due time', 'due_time', array('class'=>'col-form-label col-md-2')); */ ?>
				<div class="col-md-8">
					<?php echo Form::input('due_time', Input::post('due_time', isset($todo) ? $todo->due_time : ''), array('class' => 'form-control', 'placeholder'=>'Due time', 'type' => 'time')); ?>
					<i class="btn btn-primary">×</i>
				</div>
			</div>
		</div>
		<div class="form-group"></div>
		<div class="form-group row">
			<div class="col-md-5"></div>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>