<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {
	public $uses = array('Order','Product');
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler','Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'admin';
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->request->is('post')){
			
			$data = $this->Session->read('cart');
			//pr($data);
			$orders = array();
			$order = array();
			$customerid = $this->Session->read('customer');
			$guest=true;
			if($customerid== ''){
				$customerid=-1;
				
			}
			//pr($customerid);
			pr($customerid);
			foreach($data as $key=>$value){
				$this->Product->recursive = 0;
				$productDetails = $this->Product->findById($key);
				$orders[]=array('key'=>$key,'count'=>$value['count'],'details'=>$productDetails);
			}
			
			foreach($orders as $o){
				$order[] = array(
								'product_id'=>$o['details']['Product']['id'],
								'quantity'=>$o['count'],
								'total'=>$o['details']['Product']['price']*$o['count'],
								'customer_id'=>$customerid,
								'guest'=>$guest,
								'ipaddress'=>$this->RequestHandler->getClientIp()
							);
			}
			//pr($order);
			$this->Order->saveAll($order);
			//$this->Session->delete('cart');
			//pr($order);
			// if(!$this->Auth->loggedIn())
				// return $this->redirect(array('controller'=>'users','action'=>'login'));
			// else{
				return $this->redirect(array('controller'=>'checkout','action'=>'index'));
			// /}
		}else{
			
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$products = $this->Order->Product->find('list');
		$customers = $this->Order->Customer->find('list');
		$this->set(compact('products', 'customers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
}
