<?php
App::uses('AppController', 'Controller');

class AdminController extends AppController {
	public function index(){
		$this->layout ='admin';
	}
}
?>