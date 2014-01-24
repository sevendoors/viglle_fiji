<?php

class TicketController extends BaseController {

    protected $ticket;

    public function __construct(Ticket $ticket)
    {
        parent::__construct();

        $this->ticket = $ticket;
    }
    
	public function getIndex()
	{
//		$tickets = $this->ticket->orderBy('created_at', 'DESC')->paginate(10);

		return View::make('fiji/ticket/index', compact('tickets'));
	}

	public function getView($id)
	{
		$ticket = $this->ticket->where('id', '=', $id)->first();

		if (is_null($ticket))
		{
			return App::abort(404);
		}


		return View::make('site/ticket/view');
	}

}
