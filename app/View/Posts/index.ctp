<h2>Blog posts</h2>

<?php echo $this->Html->link(
		'Add new', 
		array('controller' => 'posts', 'action' => 'add')); ?>
<table>
	<tr>
		<th>Title</th>
		<th>Body</th>
		<th>Created Date</th>
		<th>Operation</th>
	</tr>
	
	<?php foreach($posts as $post): ?>
		<tr>
			<td><?php echo $this->Html->link($post['Post']['title'], 
				array ('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
			<td><?php echo $post['Post']['body']; ?></td>
			<td><?php echo $post['Post']['created']; ?></td>
			<td>
				<?php echo $this->Html->link('Edit', 
					array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?>|
				<?php echo $this->Form->postLink(
							'Delete',
							array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']),
							array('confirm' => 'Are you sure you want to delete?')); ?>
			</td>
	</tr>
	<?php endforeach; ?>
</table>