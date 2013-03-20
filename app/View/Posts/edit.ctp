<h2>Edit post</h2>
<?php 
	echo $this->Form->create('Post');
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('row' => '3'));
	echo $this->Form->end('Save'); 
?>