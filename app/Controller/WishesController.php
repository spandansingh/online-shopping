<?php
App::uses('AppController', 'Controller');
/**
 * Wishes Controller
 *
 * @property Wish $Wish
 * @property PaginatorComponent $Paginator
 */
class WishesController extends AppController {
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Wish->recursive = 0;
		$this->set('wishes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Wish->exists($id)) {
			throw new NotFoundException(__('Invalid wish'));
		}
		$options = array('conditions' => array('Wish.' . $this->Wish->primaryKey => $id));
		$this->set('wish', $this->Wish->find('first', $options));
	}


	public function savewish($c,$p){
		$this->autoRender = false;
		$data = array(
			'customer_id'=>$c,
			'product_id'=>$p		
		);
		$this->Wish->save($data);
		$this->redirect(array('controller'=>'Wishes','action'=>'viewwishes'));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Wish->create();
			if ($this->Wish->save($this->request->data)) {
				$this->Session->setFlash(__('The wish has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wish could not be saved. Please, try again.'));
			}
		}
		$customers = $this->Wish->Customer->find('list');
		$products = $this->Wish->Product->find('list');
		$this->set(compact('customers', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Wish->exists($id)) {
			throw new NotFoundException(__('Invalid wish'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Wish->save($this->request->data)) {
				$this->Session->setFlash(__('The wish has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wish could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Wish.' . $this->Wish->primaryKey => $id));
			$this->request->data = $this->Wish->find('first', $options);
		}
		$customers = $this->Wish->Customer->find('list');
		$products = $this->Wish->Product->find('list');
		$this->set(compact('customers', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Wish->id = $id;
		if (!$this->Wish->exists()) {
			throw new NotFoundException(__('Invalid wish'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Wish->delete()) {
			$this->Session->setFlash(__('The wish has been deleted.'));
		} else {
			$this->Session->setFlash(__('The wish could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function viewwishes(){
		$id = $this->Session->read('customer');
		$data = $this->Wish->find('all',array('conditions'=>array('Wish.customer_id'=>$id)));
		$this->set('wishes',$data);
	}
}
