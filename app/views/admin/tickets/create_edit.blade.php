@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">机票信息</a></li>
			<!--<li><a href="#tab-meta-data" data-toggle="tab"></a></li>-->
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Blog Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($ticket)){{ URL::to('admin/ticket/' . $ticket->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('flight_num') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="flight_num">航班号</label>
						<input class="form-control" type="text" name="flight_num" id="flight_num" value="{{{ Input::old('flight_num', isset($ticket) ? $ticket->flight_num : null) }}}" />
						{{{ $errors->first('flight_num', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post title -->
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('departure') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="departure">始发地</label>
						<input class="form-control" type="text" name="departure" id="departure" value="{{{ Input::old('departure', isset($ticket) ? $ticket->departure : null) }}}" />
						{{{ $errors->first('departure', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post title -->
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('departure_time') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="departure_time">出发时间</label>
						<input class="form-control" type="text" name="departure_time" id="departure_time" value="{{{ Input::old('departure_time', isset($ticket) ? $ticket->departure_time : null) }}}" />
						{{{ $errors->first('departure_time', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post title -->
				<div class="form-group {{{ $errors->has('destination_time') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="destination_time">到达时间</label>
						<input class="form-control" type="text" name="destination_time" id="destination_time" value="{{{ Input::old('destination_time', isset($ticket) ? $ticket->destination_time : null) }}}" />
						{{{ $errors->first('destination_time', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('departure_airport') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="departure_airport">出发机场</label>
						<input class="form-control" type="text" name="departure_airport" id="departure_airport" value="{{{ Input::old('departure_airport', isset($ticket) ? $ticket->departure_airport : null) }}}" />
						{{{ $errors->first('departure_airport', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('destination_airport') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="destination_airport">出发机场</label>
						<input class="form-control" type="text" name="destination_airport" id="destination_airport" value="{{{ Input::old('destination_airport', isset($ticket) ? $ticket->destination_airport : null) }}}" />
						{{{ $errors->first('destination_airport', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('discount') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="discount">折扣</label>
						<input class="form-control" type="text" name="discount" id="discount" value="{{{ Input::old('discount', isset($ticket) ? $ticket->discount : null) }}}" />
						{{{ $errors->first('discount', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('discount_price') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="discount_price">折扣价</label>
						<input class="form-control" type="text" name="discount_price" id="discount_price" value="{{{ Input::old('discount_price', isset($ticket) ? $ticket->discount_price : null) }}}" />
						{{{ $errors->first('discount_price', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('economy_price') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="economy_price">经济舱价格</label>
						<input class="form-control" type="text" name="economy_price" id="economy_price" value="{{{ Input::old('economy_price', isset($ticket) ? $ticket->economy_price : null) }}}" />
						{{{ $errors->first('economy_price', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('first_price') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="first_price">头等舱价格</label>
						<input class="form-control" type="text" name="first_price" id="first_price" value="{{{ Input::old('first_price', isset($ticket) ? $ticket->first_price : null) }}}" />
						{{{ $errors->first('first_price', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
			</div>
			<!-- ./ general tab -->

			<!-- Meta Data tab -->
			<div class="tab-pane" id="tab-meta-data">
<!-- 另一个tab直接在这里添加-->
			</div>
			<!-- ./ meta data tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<element class="btn-cancel close_popup">取消</element>
				<button type="reset" class="btn btn-default">重置</button>
				<button type="submit" class="btn btn-success">提交</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
