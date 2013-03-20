<h2>Add new post</h2>
<?php 
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('body');
	echo $this->Form->end('Create');
?>
