<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>斐济旅行</title>
		<meat chaerset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/raiders_w.css" />
		<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					items :[
								'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
								'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
								'insertunorderedlist', '|', 'emoticons', 'image', 'link','preview']
							
				});
				K('#enter').click(function(e) {
					alert(editor.html());
				});
				K('#del_empty').click(function(e) {
					editor.html('');
				});
			});
		</script>
	</head>
	<body>
		<div class="box" id="box">
			<!-- 头部开始  -->
			<div class="head">
				<div class="head_list">
					<div class="logo"></div>
					<div class="list">
						<ul class="list_card">
							<li>首页</li>
							<li class="list_index">酒店</li>
							<li>机票</li>
							<li class="list_end">专题</li>
						</ul>
					</div>
					<div class="login">
						<ul class="login_card">
							<li>登录</li>
							<li class="list_end">注册</li>
						</ul>
					</div>
					<div class="love_feiji">
						<div class="love_word">世界上有两个天堂,一个在你心里,一个在斐济。</div>
					</div>
				</div>
			</div>
			<!-- 头部结束  -->
			<!-- 正文开始  -->
			<div class="content">
				<div class="raiders_head"></div>
				<div class="raiders_title">
					<p>攻略标题<input type=text value="" id="works_title" /></p>
				</div>
				<div class="content_body">
					<form>
						<textarea name="content" style="width:1000px;height:700px;visibility:hidden;"></textarea>
					</form>
					<div class="content_button">
						<div class="content_button_top">
							<ul>
								<li class="buttons" id="enter"></li>
								<li class="buttons" id="del_empty"></li>
							</ul>
						</div>
						<div class="content_button_bottom"></div>
					</div>
				</div>
				<div class="content_bottom"></div>
			</div>
			<!-- 正文结束  -->
			<!-- 底部开始  -->
			<div class="bottom">
				<div class="bottom_word">因为有你，冲绳天堂的距离更进一步！</div>
				<div class="bottom_wall"></div>
				<div class="bottom_href"></div>
			</div>
			<!-- 底部结束  -->
		</div>
		<script type="text/javascript">
			function check_screen()
			{
				var w=window.screen.width;
				var width=document.documentElement.clientWidth;
				if(w<1920)
				{
					document.getElementById("box").style.left=-(1920-width)/2+"px";
				}
			}
			check_screen();
		</script>
	</body>
</html>