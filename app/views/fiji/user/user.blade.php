@extends('fiji/layouts/default')

@section('styles')

		<link rel="stylesheet" type="text/css" href="{{{ asset('css/user.css') }}}" />
@stop


@section('userprofile')
<div id="user_mes">
						<div class="user_img">
							<img src="images/user1.png" width=230 height=230 style="margin:6px 6px;" />
						</div>
						<div class="user_content">
							<div class="user_set"></div>
							<div class="user_word">
								<div class="user_top">
									<div class="user_introduce"><span style="margin-left:20px;">爱吃玫瑰的猫</span></div>
									<div class="user_Triangle"></div>
								</div>
								<div class="user_bottom">
									<div class="user_show_word">你心似海，一半是光一半是影，一半是海水一半是眼泪。</div>
									<p>编辑个人介绍</p>
								</div>
							</div>
						</div>
					</div>
@stop

@section('content')
<div class="content">
				<div class="content_title">
					<a href="{{{URL::to('user/album')}}}" class="iframe"><div class="content_upload_pic"></div></a>
				</div>
				<div class="content_show_pic">
					<div class="pic_left"><img src="{{{asset('images/left.png')}}}" width=45 height=90 /></div>
					<div class="pic_center">
						<table cellspacing=0 cellpadding=0 class="user_all_img" style="width:1100px;">
							<tr>
@foreach($userpics as $userpic)
								<td class="imgs_td"><img src="{{{ asset($userpic->pic_url.'/origin.jpg') }}}" width=200 height=200 /></td>
@endforeach
								<td>&nbsp;</td>
							</tr>
						</table>
					</div>
					<div class="pic_right"><img src="{{{ asset('images/right.png') }}}" width=45 height=90 /></div>
				</div>
				<div class="content_body">
					<div class="content_user_show">
						<ul class="content_user_ul">
							<li class="content_user_card1">我的攻略</li>
							<li class="content_user_card2" style="margin-left:10px;">我喜欢</li>
							<li class="content_user_card2" style="margin-left:10px;">我的足迹</li>
						</ul>
						<div class="content_user_card_bottom"></div>
						<div class="raiders_msg">
							<ul class="raiders_content">
								<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
								<li class="raiders_li2">
									<div style="width:380px;margin:20px;">
										<p class="raiders_title">上帝恩赐的礼物：斐济</p>
										<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
										<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
									</div>
									<div class="raiders_user_good"></div>
									<p align=right><span class="good_count">469</span></p>
								</li>
								
								<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
								<li class="raiders_li2">
									<div style="width:380px;margin:20px;">
										<p class="raiders_title">上帝恩赐的礼物：斐济</p>
										<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
										<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
									</div>
									<div class="raiders_user_good"></div>
									<p align=right><span class="good_count">469</span></p>
								</li>
								
								<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
								<li class="raiders_li2">
									<div style="width:380px;margin:20px;">
										<p class="raiders_title">上帝恩赐的礼物：斐济</p>
										<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
										<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
									</div>
									<div class="raiders_user_good"></div>
									<p align=right><span class="good_count">469</span></p>
								</li>
								
								<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
								<li class="raiders_li2">
									<div style="width:380px;margin:20px;">
										<p class="raiders_title">上帝恩赐的礼物：斐济</p>
										<p><span class="raiders_user_name">晚起的心</span><span class="raiders_user_time">发布于2013/5/9 14:32:02</span></p>
										<p class="raiders_user_text">也许你没听过斐济这个地方，也还不知道它到底在地球的那一个角落……</p>
									</div>
									<div class="raiders_user_good"></div>
									<p align=right><span class="good_count">469</span></p>
								</li>
								
								<li class="raiders_li1"><img src="images/user1.png" width=300 height=200 /></li>
								<li class="raiders_li2">
									<div style="width:380px;margin:20px;">
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
					<div class="content_other_mes">
							<a href="{{{ URL::to('travel/create') }}}">						<div class="enter_raiders"></div></a>
						<div class="go_where">
							<div class="more_where">更多</div>
							<ul class="show_where_user">
								<li>
									<p><img src="images/user1.png" width=105 height=105 /></p>
									<p style="font-size:14px;color:#808080;height:30px;line-height:30px;" align=center>伊泽花儿</p>
								</li>
								<li>
									<p><img src="images/user1.png" width=105 height=105 /></p>
									<p style="font-size:14px;color:#808080;height:30px;line-height:30px;" align=center>伊泽花儿</p>
								</li>
								<li>
									<p><img src="images/user1.png" width=105 height=105 /></p>
									<p style="font-size:14px;color:#808080;height:30px;line-height:30px;" align=center>伊泽花儿</p>
								</li>
							</ul>
						</div>
						<div class="your_city">
							<div class="more_city">更多</div>
							<ul class="show_city_user">
								<li>
									<p><img src="images/user1.png" width=105 height=105 /></p>
									<p style="font-size:14px;color:#808080;height:30px;line-height:30px;" align=center>伊泽花儿</p>
								</li>
								<li>
									<p><img src="images/user1.png" width=105 height=105 /></p>
									<p style="font-size:14px;color:#808080;height:30px;line-height:30px;" align=center>伊泽花儿</p>
								</li>
								<li>
									<p><img src="images/user1.png" width=105 height=105 /></p>
									<p style="font-size:14px;color:#808080;height:30px;line-height:30px;" align=center>伊泽花儿</p>
								</li>
							</ul>
						</div>
					</div>
					<div class="talk_place">
						<div class="talk_title"></div>
						<div class="talk_bg">
							<textarea style="width:938px;height:138px;border:0px;font-size:18px;color:#999;text-indent:2em;line-height:30px;overflow:hidden;" onfocus="if(this.value=='说你想说的'){this.value='';}" onblur="if(this.value==''){this.value='说你想说的';}" value="说你想说的">说你想说的</textarea>
						</div>
						<div class="talk_enter"></div>
						<div class="talk_user_msg_1">
							<div class="talk_user_img_1">
								<img src="images/user1.png" width=100 height=100 />
							</div>
							<div class="talk_user_text_1">
								<p class="user_text_1">抢个沙发，嘿嘿~抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿</p>
								<p class="user_time_1">2013/12/27　19:51</p>
							</div>
							<div class="talk_user_box_1">
								<ul>
									<li class="talk_user_name">彩虹糖糖</li>
									<li class="talk_user_enter">回复</li>
								</ul>
							</div>
						</div>
						
						<div class="talk_user_msg_1">
							<div class="talk_user_text_2">
								<p class="user_text_1">抢个沙发，嘿嘿~抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿</p>
								<p class="user_time_2">2013/12/27　19:51</p>
							</div>
							
							<div class="talk_user_img_2">
								<img src="images/user1.png" width=100 height=100 />
							</div>
							
							<div class="talk_user_box_2">
								<ul>
									<li class="talk_user_name">彩虹糖糖</li>
									<li class="talk_user_enter">回复</li>
								</ul>
							</div>
						</div>
						
						<div class="talk_user_msg_1">
							<div class="talk_user_img_1">
								<img src="images/user1.png" width=100 height=100 />
							</div>
							<div class="talk_user_text_1">
								<p class="user_text_1">抢个沙发，嘿嘿~抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿</p>
								<p class="user_time_1">2013/12/27　19:51</p>
							</div>
							<div class="talk_user_box_1">
								<ul>
									<li class="talk_user_name">彩虹糖糖</li>
									<li class="talk_user_enter">回复</li>
								</ul>
							</div>
						</div>
						
						<div class="talk_user_msg_1">
							<div class="talk_user_text_2">
								<p class="user_text_1">抢个沙发，嘿嘿~抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿抢个沙发，嘿嘿</p>
								<p class="user_time_2">2013/12/27　19:51</p>
							</div>
							
							<div class="talk_user_img_2">
								<img src="images/user1.png" width=100 height=100 />
							</div>
							
							<div class="talk_user_box_2">
								<ul>
									<li class="talk_user_name">彩虹糖糖</li>
									<li class="talk_user_enter">回复</li>
								</ul>
							</div>
						</div>
					</div>
					<div>
						<ul class="show_page_2">
							<li  class="show_li_1">1</li>
							<li  class="show_li_2">2</li>
							<li class="show_page_next">下一页</li>
						</ul>
					</div>
				</div>
			</div>
@stop
@section('scripts')
	<script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript">
		var thispage=0;
		var countpage="4";
		$(document).ready(function(){
			 $(".pic_right").click(function () {
				if (thispage == (parseInt(countpage) - 1)) {
					return;
				}
				thispage++;
				var MarginLeft = thispage *220;
				 $(".user_all_img").stop(true).delay(300).animate({"marginLeft": "-" + MarginLeft + "px"});
			});
			$(".pic_left").click(function () {
				if (thispage == 0) {
					return;
				}
				thispage--;
				var MarginRight = thispage * 220;
				$(".user_all_img").stop(true).delay(300).animate({"marginLeft": "-" + MarginRight + "px"});
			});
		});
	</script>
@stop
