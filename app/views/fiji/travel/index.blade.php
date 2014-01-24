@extends('fiji.layouts.default')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{{ asset('css/travel.css') }}}" />
@stop


@section('content')

<div class="content">
				<div class="content_body">
					<div class="content_user_show">
							<ul class="content_user_ul">
								<li class="content_user_card1">玩转斐济岛</li>
								<li class="content_user_card2" style="margin-left:10px;">吃货走天下</li>
							</ul>
							<div class="content_user_card_bottom"></div>
					</div>
					<div class="raiders_msg">
						<ul class="raiders_content">
@foreach($travels as $travel)
							<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
							<li class="raiders_li2">
								<div style="width:580px;margin:20px;">
									<p class="raiders_title">上帝恩赐的礼物：斐济</p>
									<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
									<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
								</div>
								<div class="raiders_user_good"></div>
								<p align=right><span class="good_count">469</span></p>
							</li>
@endforeach
							
							<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
							<li class="raiders_li2">
								<div style="width:580px;margin:20px;">
									<p class="raiders_title">上帝恩赐的礼物：斐济</p>
									<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
									<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
								</div>
								<div class="raiders_user_good"></div>
								<p align=right><span class="good_count">469</span></p>
							</li>
							
							<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
							<li class="raiders_li2">
								<div style="width:580px;margin:20px;">
									<p class="raiders_title">上帝恩赐的礼物：斐济</p>
									<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
									<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
								</div>
								<div class="raiders_user_good"></div>
								<p align=right><span class="good_count">469</span></p>
							</li>
							
							<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
							<li class="raiders_li2">
								<div style="width:580px;margin:20px;">
									<p class="raiders_title">上帝恩赐的礼物：斐济</p>
									<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
									<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
								</div>
								<div class="raiders_user_good"></div>
								<p align=right><span class="good_count">469</span></p>
							</li>
							
							<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
							<li class="raiders_li2">
								<div style="width:580px;margin:20px;">
									<p class="raiders_title">上帝恩赐的礼物：斐济</p>
									<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
									<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
								</div>
								<div class="raiders_user_good"></div>
								<p align=right><span class="good_count">469</span></p>
							</li>
						</ul>
					</div>
					<div>
						<ul class="show_page_1">
							<li  class="show_li_1">1</li>
							<li  class="show_li_2">2</li>
							<li class="show_page_next">下一页</li>
						</ul>
					</div>
				</div>
				<div class="content_bottom"></div>
			</div>


@stop
