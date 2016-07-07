<?php
App::uses('AppController', 'Controller');
class HomeController extends AppController {

	public $uses = array('Product','Category');
	
	public function index(){
		$products = $this->Product->find('all');
		$categories = $this->Category->find('all');
		$electronics = $this->Product->find('all',array('conditions'=>array('Category.id'=>2)));
		//pr($electronics);
		$books = $this->Product->find('all',array('conditions'=>array('Category.id'=>1)));
		$electronics = $this->Product->find('all',array('conditions'=>array('Category.id'=>2)));
		$this->set('electronics',$electronics);
		$this->set('books',$books);
		$this->set('categories',$categories);
	}
}
