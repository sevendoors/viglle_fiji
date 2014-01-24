<?php

class TravelController extends BaseController{
		protected $travel;
		protected $user;

		public function __construct(Travel $travel, User $user){
				parent::__construct();
				$this->travel=$travel;
				$this->user = $user;
		}

		public function getIndex(){
				$travels = $this->travel->orderBy('created_at', 'DESC')->get();
				return View::make('fiji/travel/index',compact('travels'));
		}

		public function getCreate(){
						$user = Auth::user();
						if(empty($user)){
								return Redirect::to('user/login');
						}
				return View::make('fiji/travel/create_edit');
		}

		public function postCreate(){
				$rules = array(
						'title' => 'required|min:3',
						'content' => 'required|min:3'
				);

				$validator = Validator::make(Input::all(), $rules);

				if($validator->passes())
				{
						$user = Auth::user();
						if(empty($user)){
								return Redirect::to('user/login');
						}

						$this->travel->user_id = $user->id;

						$this->travel->title   = Input::get('title');
						$this->travel->content = Input::get('content');

						if($this->travel->save()){
								return Redirect::to('travel/'.$this->travel->id.'/show')->with('success','成功发布旅游攻略');
						}
						return Redirect::to('travel/'.$this->travel->id.'/show')->with('error','发布文章失败');
				}

				return Redirect::to('travel/create')->withInput()->withErrors($validator);
		}

}
