<?php

use Robbo\Presenter\PresentableInterface;

class Userpic extends Eloquent implements PresentableInterface{


	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}


    public function user()
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
        return new UserpicPresenter($this);
    }
}
