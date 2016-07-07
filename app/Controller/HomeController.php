<?php
App::uses('AppController', 'Controller');
class HomeController extends AppController {

	public $uses = array('Product','Category');
	
	public function index(){
		
		$categories = $this->Category->find('all');
		
		$electronics = $this->Product->find('all',
			array(
				'conditions'=>array(
					'Category.id'=>2,
					'Product.status' => 1
				)
			)
		);

		$books = $this->Product->find('all',
			array(
				'conditions'=>	array(
					'Category.id' => 1,
					'Product.status' => 1
				)
			)
		);
		
		$this->set(compact('electronics', 'books', 'categories'));
	}
}
