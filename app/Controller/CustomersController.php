<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {
	public $uses = array('Customer','State','City','Address','User');
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
		$this->Customer->recursive = 0;
		$this->set('customers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout ='seller';
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			$user = array(
				'username' => $this->request->data['Customer']['email'],
				'password' => $this->request->data['Customer']['password'],
				
			);
			pr($this->request->data);
			$this->User->create();
			$this->User->save($user);
			$userid = $this->User->getLastInsertId();
			$address = array(
				'houseno'=>$this->request->data['Customer']['house_no'],
				'streetname'=>$this->request->data['Customer']['streetname'],
				'locality'=>$this->request->data['Customer']['locality'],
				'city'=>$this->request->data['Customer']['city'],
				'state'=>$this->request->data['Customer']['state'],
				'pincode'=>$this->request->data['Customer']['pincode'],
			);
			$this->Address->save($address);
		
			$addressId = $this->Address->getLastInsertId();
			$customer = array(
				'firstname'=>$this->request->data['Customer']['firstname'],
				'lastname'=>$this->request->data['Customer']['lastname'],
				'address_id'=>$addressId,
				'age'=>$this->request->data['Customer']['age'],
				'occupation'=>$this->request->data['Customer']['occupation'],
				'user_id'=>$userid
			);
			
			$this->Customer->save($customer);
			return $this->redirect(array('controller'=>'users',action=>'login'));
		}
		$states = $this->State->find('list');
		$this->set('states',$states);
		$cities = $this->City->find('list');
		$this->set('cities',$cities);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
		}
		$addresses = $this->Customer->Address->find('list');
		$this->set(compact('addresses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Customer->delete()) {
			$this->Session->setFlash(__('The customer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
