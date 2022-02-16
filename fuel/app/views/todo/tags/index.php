<?php use Fuel\Core\Html; ?>

<h2>Listing <span class='muted'>Todo_tags</span></h2>
<br>
<?php if ($todo_tags): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Tag</th>
			<th>Created user</th>
			<th>Updated user</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($todo_tags as $item): ?>		<tr>

			<td><?php echo $item->tag; ?></td>
			<td><?php echo $item->created_user; ?></td>
			<td><?php echo $item->updated_user; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('todo/tags/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('todo/tags/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('todo/tags/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Todo_tags.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('todo/tags/create', 'Add new Todo tag', array('class' => 'btn btn-success')); ?>

</p>
