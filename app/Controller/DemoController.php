<?php

	class DemoController extends AppController{
		public function index(){
			$data = "My Message";
			$this->set('data',$data);
		}
	}
	

?>