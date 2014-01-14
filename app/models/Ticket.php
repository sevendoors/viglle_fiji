<?php

use Illuminate\Support\Facades\URL; # not sure why i need this here :c
use Robbo\Presenter\PresentableInterface;

class Ticket extends Eloquent implements PresentableInterface {

	public function delete()
	{
		return parent::delete();
	}


	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}


    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	public function url()
	{
		return Url::to($this->id);
	}

	public function created_at()
	{
		return $this->date($this->created_at);
	}

	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

    public function getPresenter()
    {
        return new PostPresenter($this);
    }

}
