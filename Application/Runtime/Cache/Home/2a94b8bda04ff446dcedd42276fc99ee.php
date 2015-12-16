<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>ifree助手</title>
	<meta content="ifree微信,微信开发,weiphp,理工掌上图书馆，理工大学官方微信，" name="keywords">
	<meta content="ifree微信是一个专注于微信开发与服务的平台" name="description">
	<meta name="baidu_union_verify" content="b63a63542e3c87d9caa8c41cb32f16bd">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="baidu_union_verify" content="8ee142047755b94b42abaf3ee34bad41">
	<link rel="shortcut icon" href="/sinasvn/ifreehand/1/Public/index/logo.ico">
	<link href="/sinasvn/ifreehand/1/Public/index/css" rel="stylesheet" type="text/css">
	<link href="/sinasvn/ifreehand/1/Public/index/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="/sinasvn/ifreehand/1/Public/index/style.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="/sinasvn/ifreehand/1/Public/index/communication.css">

	<!--客服-->
	<link href="/sinasvn/ifreehand/1/Public/index/lrtk.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/sinasvn/ifreehand/1/Public/index/jquery-1.8.3.min.js"></script>
	<script>
		$(function(){
			$(window).scroll(function(){
			if($(window).scrollTop()>100){  //距顶部多少像素时，出现返回顶部按钮
				$("#side-bar .gotop").fadeIn();	
			} else{
				$("#side-bar .gotop").hide();
			}
		});
			$("#side-bar .gotop").click(function(){
			$('html,body').animate({'scrollTop':0},500); //返回顶部动画 数值越小时间越短
		});
		});
	</script>
	<!--客服-->
	<script src="/sinasvn/ifreehand/1/Public/index/jquery.min.js"></script>
	<!-- start gallery Script -->
	<script type="text/javascript" src="/sinasvn/ifreehand/1/Public/index/jquery.easing.min.js"></script>
	<script type="text/javascript" src="/sinasvn/ifreehand/1/Public/index/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
		$(function (){
			var filterList = {
				init: function () {
					$('#portfoliolist').mixitup({
						targetSelector: '.portfolio',
						filterSelector: '.filter',
						effects: ['fade'],
						easing: 'snap',
						onMixEnd: filterList.hoverEffect()
					});				
				},
				hoverEffect: function () {
					// Simple parallax effect
					$('#portfoliolist .portfolio').hover(
						function () {
							$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
							$(this).find('img').stop().animate({top: 0}, 500, 'easeOutQuad');				
						},
						function () {
							$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeInQuad');
							$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
						});				
				} };
			// Run the show!
			filterList.init();
		});
	</script>
	<!-- Add fancyBox main JS and CSS files -->
	<script src="/sinasvn/ifreehand/1/Public/index/jquery.magnific-popup.js" type="text/javascript"></script>
	<link href="/sinasvn/ifreehand/1/Public/index/magnific-popup.css" rel="stylesheet" type="text/css">
	<script>
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});
		});
	</script>
	<script type="text/javascript" src="/sinasvn/ifreehand/1/Public/index/move-top.js"></script>
	<script type="text/javascript" src="/sinasvn/ifreehand/1/Public/index/easing.js"></script>
	<!-- end gallery -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>

<body style="background-color: #F6F6F6">
	<!-- start-header -->
	<div class="header_bg">
		<div class="wrap">
			<div class="header">
				<!-- start-logo -->
				<div class="logo">
					<a href=""><img src="/sinasvn/ifreehand/1/Public/index/logo.png"></a>
				</div>
				<!-- end-logo -->
				<!-- start-nav -->
				<div class="nav">
					<ul>
						<li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-4"><a href="http://ifreehand.sinaapp.com" style="color:#ffffff; background:#1BBC9B;">首页</a></li>
						<li id="menu-item-6" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-6"><a href="http://115.28.205.182/ifreehand">ifree助手</a></li>
						<li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a href="http://115.28.205.182/bbs">小i社区</a></li>
						<li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-66"><a href="<?php echo U('paytous');?>">捐赠我们</a></li>
					</ul>
				</div> 
				<!-- end-nav -->
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- end-header -->

	<script type="text/javascript">
		$(document).ready(function(){
			$(".nav ul li a[href='http://ifreehand.sinaapp.com']").css({
				"background":"rgb(27,188,155)","color":"#fff"
			})
		});
	</script>

	<!-- start slider -->
	<div class="slider_bg">
		<div class="wrap">
			<!-- start-da-slider -->
			<div class="da-slide">
				<h2><span>ifree助手</span></h2>
				<p>专注于微信开发服务，微信开发如此简单</p>
				<a href="javascript:;" class="da-link">查看更多</a>
				<a href="#portfolio" class="scroll"><span class="da-img"> </span></a>
			</div>
			<!-- End-da-slider -->
		</div> 
	</div>
	<!-- end-slider -->
	<!-- 客服-->
	<ul id="side-bar" class="side-pannel side-bar">
		<a href="http://jq.qq.com/?_wv=1027&k=bhNTRl" target="_blank" class="text">
			<s class="g-icon-qq1"></s>
			<span>官方群</span>
		</a>
		<a href="javascript:;" class="qr">
			<s class="g-icon-qr1"></s>
			<i><img src="/sinasvn/ifreehand/1/Public/index/qr.jpg" alt="" style="width: 160px;height: 160px;"></i>
		</a>
		<a href="http://wpa.qq.com/msgrd?v=3&uin=1334506819&site=qq&menu=yes" class="text survey" target="_blank">
			<s class="g-icon-survey1"></s>
			<span>联系我们</span>
		</a>
	</ul>
	<!--客服end-->

	<!--start portfolio------>
	<div class="wrap" id="portfolio">
		<div class="main">
			<!-- start gallery  -->
			<div class="gallery1">
				<!---start-content -->
				<div class="plus_title">功能模块</div>
				<div class="gallery">
					<div class="clear"></div>
					<div class="container">
						<ul class="plus_list">
							<li>
								<a href="javascript:;">
									<img style="background:#535c63" src="/sinasvn/ifreehand/1/Public/index/icon_add.png">
									<span class="t">自定义菜单</span>
									<span class="desc">
										简单配置，即可实现自己的自定义菜单，微粉丝带来方便的交互
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#5192c0" src="/sinasvn/ifreehand/1/Public/index/icon_chat.png">
									<span class="t">智能聊天</span>
									<span class="desc">
										通过网络上支持的智能API，实现：天气、翻译,IP查询、手机号码归属、人工智能聊天等功能
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#fac303" src="/sinasvn/ifreehand/1/Public/index/icon_laugh.png">
									<span class="t">欢迎语</span>
									<span class="desc">
										用户关注公众号时发送的欢迎信息，支持文本，图片，图文的信息
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#e953eb" src="/sinasvn/ifreehand/1/Public/index/icon_card.png">
									<span class="t">会员卡</span>
									<span class="desc">
										轻松制作一个微会员卡，可以实行会员管理，优惠券发布和管理，通知的发布和管理
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#333" src="/sinasvn/ifreehand/1/Public/index/icon_qr.png">
									<span class="t">微信宣传页</span>
									<span class="desc">
										微信公众号二维码推广页面，用作推广或者制作广告，可以发布到QQ群微博博客论坛等
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#78caf9" src="/sinasvn/ifreehand/1/Public/index/icon_setting.png">
									<span class="t">插件管理</span>
									<span class="desc">
										按需启用需要的功能模块
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#f38c06" src="/sinasvn/ifreehand/1/Public/index/icon_tag.png">
									<span class="t">积分管理</span>
									<span class="desc">
										配置积分值，财富值，管理粉丝积分
									</span>
								</a>
							</li>

							<li>
								<a href="javascript:;">
									<img style="background:#82f606" src="/sinasvn/ifreehand/1/Public/index/icon_survey.png">
									<span class="t">微调研</span>
									<span class="desc">
										建立调研，让粉丝参与进来参与，可查看调研结果，调研结束同时可以设置抽奖
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#f69e69" src="/sinasvn/ifreehand/1/Public/index/icon_quiz.png">
									<span class="t">微测试</span>
									<span class="desc">
										录入题目，管理题目，设置测试结果，增加趣味和粉丝粘性。
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#13b7e6" src="/sinasvn/ifreehand/1/Public/index/icon_test.png">
									<span class="t">微考试</span>
									<span class="desc">
										主要功能有试卷管理，题目录入管理，考生信息和考分汇总管理。
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#d60f30" src="/sinasvn/ifreehand/1/Public/index/icon_coupon.png">
									<span class="t">优惠券</span>
									<span class="desc">
										配合粉丝圈子，打造粉丝互动的运营激励基础
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#d7620c" src="/sinasvn/ifreehand/1/Public/index/icon_scrach.png">
									<span class="t">刮刮卡</span>
									<span class="desc">
										模拟真实刮刮卡效果，是活动抽奖环节的必备功能，设置奖品，中奖概率
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#f3b40a" src="/sinasvn/ifreehand/1/Public/index/icon_hitegg.png">
									<span class="t">砸金蛋</span>
									<span class="desc">
										模拟真实砸金蛋效果，是活动的必备功能，增强与粉丝的互动，支持设置奖品，中奖概率
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#e14420" src="/sinasvn/ifreehand/1/Public/index/icon_pan.png">
									<span class="t">幸运大转盘</span>
									<span class="desc">
										转盘随机中奖，增强与粉丝的互动，支持设置奖品，中奖类型，中奖概率
									</span>
								</a>
							</li>


							<li>
								<a href="javascript:;">
									<img style="background:#13b7e6" src="/sinasvn/ifreehand/1/Public/index/icon_web.png">
									<span class="t">微官网</span>
									<span class="desc">
										支持分类设置，文章编辑，统计代码配置，多套首页模板 分类模板 详情模板，菜单任意选择
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#34e19e" src="/sinasvn/ifreehand/1/Public/index/icon_write.png">
									<span class="t">通用表单</span>
									<span class="desc">
										管理员可以轻松地增加一个表单用于收集用户的信息，如活动报名、调查反馈、预约填单等
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#f9e009" src="/sinasvn/ifreehand/1/Public/index/icon_product.png">
									<span class="t">万能页面</span>
									<span class="desc">
										可以通过拖拉的方式配置一个3G页面
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#f99009" src="/sinasvn/ifreehand/1/Public/index/icon_store.png">
									<span class="t">微商店</span>
									<span class="desc">
										实现商店商品管理、分类管理等功能
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img style="background:#82f606" src="/sinasvn/ifreehand/1/Public/index/icon_diy.png">
									<span class="t">融合第三方</span>
									<span class="desc">
										支持配置第三方功能扩展
									</span>
								</a>
							</li>
							<li>
								<a href="http://115.28.205.182/bbs" target="_blank">
									<img style="background:#0d8fda" src="/sinasvn/ifreehand/1/Public/index/icon_add.png">
									<span class="t">更多功能模块不断添加中...</span>
									<span class="desc">
										了解更多功能，请前往<strong>小i社区查看</strong>
									</span>
								</a>

							</li>
						</ul>

						<style type="text/css">
							/* plus list */
							.plus_title{ width:100%; margin:0 auto; height:50px;text-align:center; line-height:50px; color:#333; font-size:20px; background:#FFE0EE; border-top:1px solid #eee; border-bottom:1px solid #eee;}
							.plus_list{ overflow:hidden; zoom:1; margin:0 0;margin-top: 30px;margin-left: 25px;}
							.plus_list li{ float:left; width:160px; height:250px; margin:0 20px; display:inline}
							.plus_list li a{ display:block; text-align:center; color:#666;text-decoration:none}
							.plus_list li a img{ padding:20px; border-radius:30px; width:100px; height:100px; background:#C30; margin-bottom:10px;}
							.plus_list li a .t{ font-size:16px; font-weight:bold; display:block}
							.plus_list li a .desc{ margin-top: 10px; text-align:left; display:block; color:#999}
						</style>
						<ul id="filters" class="clearfix">
						</ul>
						<div id="portfoliolist">
						</div>
					</div>
					<!-- container -->
					<script type="text/javascript" src="/sinasvn/ifreehand/1/Public/index/fliplightbox.min.js"></script>
					<script type="text/javascript">$('body').flipLightBox()</script>
					<div class="clear"> </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End-gallery -->
	<div class="footer">
		<div class="wrap foot_wrap">
			<div class="foot_div">
				<h6>关于</h6>
				<a href="">关于我们</a><br>
				<a href="">联系方式</a><br>
				<a href="">加入我们</a><br>
			</div>
			<div class="foot_div">
				<h6>帮助</h6>
				<a href="http://115.28.205.182/bbs">官方论坛</a><br>
				<a href="http://115.28.205.182/bbs">开发文档</a><br>
				<a href="http://jq.qq.com/?_wv=1027&k=bhNTRl">官方QQ交流群：213014169</a>
			</div>
			<div class="foot_div">
				<h6>更多</h6>
				<a href="">微信扫码右侧二维码</a><br>
				<a href="">关注ifree官方微信公众号<br>体验ifree微信的最新功能</a>
				<a href=""><img src="/sinasvn/ifreehand/1/Public/index/qr.jpg" alt="" style="width: 100px;height: 100px;float: right;margin-top: -80px;"></a>
			</div>
		</div>
		<p class="copyright">Copyright © 2014-2015 ifree助手 All Rights Reserved 鄂ICP备13021846号-1</p>
	</div>
</body>
</html>