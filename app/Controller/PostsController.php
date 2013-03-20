<?php
class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
		$this->set('posts', $this->Post->find('all'));
	}
	
	public function view($id) {
		if (!$id) {
            throw new NotFoundException(('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(('Invalid post'));
        }
        $this->set('post', $post);
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash("Your post has been saved");
				$this->redirect(array('controller' => 'posts', 'action' => 'index'));
			} else {
				$this->Session->setFlash('Unable to add your post');
			}
		}		
	}
	
	public function edit($id = null) {
		if (empty($id)) {
			throw new NotFoundException('Invalid post');
		}
		
		$post = $this->Post->findById($id);
		if (empty($post)) {
			throw new NotFoundException('Invalid post');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('Your post has been updated');
				$this->redirect(array('controller' => 'posts', 'action' => 'index'));
			} else {
				$this->Session->setFlash('Unable to update your post');
			}
		}
		
		if (empty($this->request->data)) {
			$this->request->data = $post;
		}
	}
	
	public function delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException(); 
		}
		
		$post = $this->Post->findById($id);
		
		if ($this->Post->delete($id)) {
			$this->Session->setFlash("The post $post->title has been deleted");
		} else {
			$this->Session->setFlash("Unable to delete the post $post->title");
		}
		
		$this->redirect(array('controller' => 'posts', 'action' => 'index'));
	}
	
}