<?php

namespace App\Controller;

final class BlogController extends AppController{

	protected $models = array(
		'BlogPostModel' => 'Post'
	);

	/**
	 * Blog's index
	 *
	 * @return void
	 */
	final public function index(){
		$posts = $this->Post->all();
		$this->View->send('posts', $posts);

		$this->View->setFilename('blog.index'); // Not necessary
	}

	/**
	 * Shows a Blog's post
	 * 
	 * @param string $slug
	 * @param int $id
	 * @return void
	 */
	final public function view($slug, $id){
		$post = $this->Post->find($id);
	}

}