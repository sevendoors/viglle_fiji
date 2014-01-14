@extends('site.layouts.default')

{{-- Content --}}
@section('content')
@foreach ($tickets as $ticket)
{{ $ticket->url() }}
@endforeach

{{ $tickets->links() }}

@stop
