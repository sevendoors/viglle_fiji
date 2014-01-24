<?php
class IndexController extends BaseController {
		protected $hotel;
		protected $user;
		public function __construct()
		{
				parent::__construct();
		}


		public function getIndex(){
				return View::make('fiji/index');
		}

}
?>
