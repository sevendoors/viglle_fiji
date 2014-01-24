@extends('site.layouts.default')



{{-- Content --}}
@section('content')
<h3>{{ $ticket->flight_num }}</h3>

<p>{{ $ticket->count }}</p>

<div>
	<span class="badge badge-info">Posted {{{ $ticket->author() }}}</span>
</div>

<hr />

@stop
