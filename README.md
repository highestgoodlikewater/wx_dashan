# wx_dashan
利用thinkphp实现的微信公众平台搭讪系统

注意该微信公众号必须是已经认证过的订阅号或者已经认证过的服务号

--------------------- 华丽分割线 -------------------------

安装指南：

第一步：
	向数据库中导入涉及的表（在sql文件夹中）
	wx_accesstoken
	wx_userinfo

第二步：
	修改数据库连接信息：
		路径：Application/Common/Conf/config.php

	修改微信appid/secret信息：
		路径：Home/Controller/UtilsController.class.php文件里的get_access_token方法（第318行）
		将 $appid 改为自己微信的appid（第334行）
		将 $secret 改为自己微信的secret（第335行）

	修改域名信息：
		路径：Home/Controller/UtilsController.class.php文件里的get_dashan_url方法（第24行）
		将：www.ifreehand.sinaapp.com 改成自己的域名

第三步：
	在浏览器中访问以下路径：
		http://域名/index.php/Home/Utils/get_all_userinfo
		把已经关注微信的用户信息存入数据库，等待程序运行结束

第四步：
	设置该微信的客服人员(无上限)
		* 前提：该用户已经关注过该微信
		访问数据库里wx_userinfo表，找到该用户，将ta的flag字段设置为1（如果找不到ta，让ta与微信互动后，再查找一下）


第五步：
	测试：
	回复以下关键字
	搭讪（随机匹配该微信平台里的用户）
	搭讪妹子（根据微信个人信息，匹配性别为女的）
	搭讪汉子（根据微信个人信息，匹配性别为男的）
	搭讪客服（匹配该微信平台里的客服人员，即数据库wx_userinfo表里flag字段为1的）
	……
	更多搭讪条件可扩展



=============== 详细说明 =================

1.文件说明：

	WeixinController.class.php
	// 微信主文件，实现开发者模式的对接
	// 微信后台对接url ：http://服务器域名/index.php/Home/Weixin/index

	ReplyController.class.php
	// xml消息回复封装类

	UtilsController.class.php
	// 微信常用工具类

	DashanController.class.php
	// 网页搭讪控制类

	ValidController.class.php
	// 微信接入校验类

---------------------------------------------------------------------------

2.数据库设计：
	2.1 wx_accesstoken表：微信access_token表
		字段说明：
		access_token：微信access_token
		utime：access_token最后的更新时间


	2.2 wx_userinfo表：用户个人信息表
		字段说明见数据库备注

