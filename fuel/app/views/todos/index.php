<h2>Listing <span class='muted'>Todos</span></h2>
<br>
<?php if ($todos): ?>
<div>
	<div class="btn-toolbar">
		<div class="btn-group">
			<?php echo Html::anchor('todos/download', '<i class="icon-trash icon-white"></i> ダウンロード', array('class' => 'btn btn-sm btn-primary', 'onclick' => "return confirm('一覧データをダウンロードしますか？')")); ?>
		</div>
	</div>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Comment</th>
			<th>State</th>
			<th>Due date</th>
			<th>Due time</th>
			<th>Created user</th>
			<th>Updated user</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($todos as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->comment; ?></td>
			<td><?php echo $item->state; ?></td>
			<td><?php echo $item->due_date; ?></td>
			<td><?php echo $item->due_time; ?></td>
			<td><?php echo $item->created_user; ?></td>
			<td><?php echo $item->updated_user; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('todos/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('todos/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('todos/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
					</div>
				</div>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Todos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('todos/create', 'Add new Todo', array('class' => 'btn btn-success')); ?>

</p>
