<?php

class AdminTicketsController extends AdminController {

    protected $ticket;

    public function __construct(Ticket $ticket)
    {
        parent::__construct();
        $this->ticket = $ticket;
    }

    public function getIndex()
    {
        $title = Lang::get('admin/blogs/title.blog_management');
        $tickets = $this->ticket;
        return View::make('admin/tickets/index', compact('posts', 'title'));
    }

	public function getCreate()
	{
        $title = Lang::get('admin/blogs/title.create_a_new_blog');
        return View::make('admin/tickets/create_edit', compact('title'));
	}

	public function postCreate()
	{
        $rules = array(
            'departure'   => 'required|min:3',
            'departure_time' => 'required|min:3'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $user = Auth::user();

			$this->ticket->flight_num	=	Input::get('flight_num');
            $this->ticket->departure        = Input::get('departure');
            $this->ticket->departure_time   = Input::get('departure_time');
            $this->ticket->destination_time = Input::get('destination_time');
			$this->ticket->departure_airport		=	Input::get('departure_airport');
			$this->ticket->destination_airport	=	Input::get('destination_airport');
			$this->ticket->discount	=	Input::get('discount');
			$this->ticket->discount_price	=	Input::get('discount_price');
			$this->ticket->economy_price	=	Input::get('economy_price');
			$this->ticket->first_price	=	Input::get('first_price');


            if($this->ticket->save())
            {
                return Redirect::to('admin/tickets/' . $this->ticket->id . '/edit')->with('success', Lang::get('admin/blogs/messages.create.success'));
            }

            return Redirect::to('admin/tickets/create')->with('error', Lang::get('admin/blogs/messages.create.error'));
        }

        return Redirect::to('admin/tickets/create')->withInput()->withErrors($validator);
	}

	public function getShow($ticket)
	{
        // redirect to the frontend
	}

	public function getEdit($ticket)
	{
        $title = Lang::get('admin/blogs/title.blog_update');
        return View::make('admin/blogs/create_edit', compact('post', 'title'));
	}

	public function postEdit($ticket)
	{
        $rules = array(
            'departure'   => 'required|min:3',
            'departure_time' => 'required|min:3'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes())
        {
            $ticket->departure        = Input::get('departure');
            $ticket->departure_time   = Input::get('departure_time');
            $ticket->destination_time = Input::get('destination_time');
			$ticket->departure_airport		=	Input::get('departure_airport');
			$ticket->destination_airport	=	Input::get('destination_airport');
			$ticket->flight_num	=	Input::get('flight_num');
			$ticket->discount	=	Input::get('discount');
			$ticket->discount_price	=	Input::get('discount_price');
			$ticket->economy_price	=	Input::get('economy_price');
			$ticket->first_price	=	Input::get('first_price');
            if($ticket->save())
            {
                return Redirect::to('admin/blogs/' . $ticket->id . '/edit')->with('success', Lang::get('admin/blogs/messages.update.success'));
            }
            return Redirect::to('admin/blogs/' . $ticket->id . '/edit')->with('error', Lang::get('admin/blogs/messages.update.error'));
        }
        return Redirect::to('admin/blogs/' . $ticket->id . '/edit')->withInput()->withErrors($validator);
	}
    public function getDelete($ticket)
    {
        $title = Lang::get('admin/blogs/title.blog_delete');
        return View::make('admin/tickets/delete', compact('post', 'title'));
    }
    public function postDelete($ticket)
    {
        $rules = array(
            'id' => 'required|integer'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes())
        {
            $id = $ticket->id;
            $ticket->delete();
            $ticket = Ticket::find($id);
            if(empty($ticket))
            {
                return Redirect::to('admin/tickets')->with('success', Lang::get('admin/blogs/messages.delete.success'));
            }
        }
        return Redirect::to('admin/tickets')->with('error', Lang::get('admin/blogs/messages.delete.error'));
    }

    public function getData()
    {
        $tickets = Ticket::select(array('tickets.id', 'tickets.departure', 'tickets.destination_time', 'tickets.created_at'));

        return Datatables::of($tickets)


        ->add_column('actions', '<a href="{{{ URL::to(\'admin/tickets/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/tickets/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')

        ->remove_column('id')

        ->make();
    }

}
