@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">酒店属性</a></li>
			<li><a href="#tab-meta-data" data-toggle="tab">酒店图片</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Blog Form --}}
	<form class="form-horizontal" enctype="multipart/form-data" method="post" action="@if (isset($hotel)){{ URL::to('admin/hotels/' . $hotel->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="name">酒店名称</label>
						<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($hotel) ? $hotel->name : null) }}}" />
						{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post title -->
				<!-- Post Price -->
				<div class="form-group {{{ $errors->has('price') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="price">价格</label>
						<input class="form-control" type="text" name="price" id="price" value="{{{ Input::old('price', isset($hotel) ? $hotel->price : null) }}}" />
						{{{ $errors->first('price', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post price -->
				<!-- Post Link -->
				<div class="form-group {{{ $errors->has('link') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="link">链接到</label>
						<input class="form-control" type="text" name="link" id="link" value="{{{ Input::old('link', isset($hotel) ? $hotel->link : null) }}}" />
						{{{ $errors->first('link', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post link -->

				<!-- Content -->
				<div class="form-group {{{ $errors->has('content') ? 'error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="content">Content</label>
						<textarea class="form-control full-width wysihtml5" name="content" value="content" rows="10">{{{ Input::old('content', isset($hotel) ? $hotel->content : null) }}}</textarea>
						{{{ $errors->first('content', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ content -->
			</div>
			<!-- ./ general tab -->

			<!-- Meta Data tab -->
			<div class="tab-pane" id="tab-meta-data">
				<!-- Post Price -->
				<div class="form-group {{{ $errors->has('pic1_url') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="pic1_url">图片</label>
						<input class="form-control" type="file" multiple name="pic1_url" id="pic1_url" value="{{{ Input::old('pic1_url', isset($hotel) ? $hotel->pic1_url : null ) }}}" />
						{{{ $errors->first('pic1_url', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('pic2_url') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="pic2_url">图片</label>
						<input class="form-control" type="file" multiple name="pic2_url" id="pic2_url" value="{{{ Input::old('pic2_url', isset($hotel) ? $hotel->pic2_url : null ) }}}" />
						{{{ $errors->first('pic2_url', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('pic3_url') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="pic3_url">图片</label>
						<input class="form-control" type="file" multiple name="pic3_url" id="pic3_url" value="{{{ Input::old('pic3_url', isset($hotel) ? $hotel->pic3_url : null ) }}}" />
						{{{ $errors->first('pic3_url', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<div class="form-group {{{ $errors->has('pic4_url') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="pic4_url">图片</label>
						<input class="form-control" type="file" multiple name="pic4_url" id="pic4_url" value="{{{ Input::old('pic4_url', isset($hotel) ? $hotel->pic4_url : null ) }}}" />
						{{{ $errors->first('pic4_url', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post price -->
			</div>
			<!-- ./ meta data tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Update</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
