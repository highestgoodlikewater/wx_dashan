<?php
namespace Home\Controller;
use Think\Controller;

/**
* 网页搭讪控制类
*/
class DashanController extends Controller{
	
	public function index(){
		// 搭讪者openid
		$from_openid = I('from_openid');
		// 被搭讪者openid
		$to_openid = I('to_openid');

		// 用户个人信息表
		$db_userinfo = M('userinfo');

		// 搭讪者个人信息
		$from_info_arr = $db_userinfo->where(array("openid" => "{$from_openid}"))->find();
		// 被搭讪者个人信息
		$to_info_arr = $db_userinfo->where(array("openid" => "{$to_openid}"))->find();

		if (IS_POST) {
			
			// 实例化工具类
			$utilsObj = new UtilsController();

			//发送的内容
			$contents = I('contents');

			//搭讪者所在城市
			$from_city = $from_info_arr['city'] != null? "来自".$from_info_arr['city']."的":"";
			//搭讪者性别
			$from_sex = $from_info_arr['sex'] == 1? "汉子👦":"妹子👧";
			//搭讪者昵称
			$from_nickname = $from_info_arr['nickname'];
			// 搭讪url
			$dashan_url = $utilsObj->get_dashan_url($to_openid, $from_openid);

			// 拼接向被搭讪者要发送的消息
			$to_content = $from_city.$from_nickname.$from_sex;
			$to_content .= "向你发来消息：\n------------------\n\n" . $contents . "\n\n";
			$to_content .= "<a href='{$dashan_url}'>点此回复</a>";
			$to_content .= "\n------------------\n";
			$to_content .= "发送“@+你想说的话”可以快速回复ta哦[色]";

			// 向被搭讪者发送消息
			$jsondata = $utilsObj->send_custom_message($to_openid, "text", $to_content);
			$arrdata = json_decode($jsondata, true);

			// 拼接向搭讪者要发送的消息
			$dashan_url2 = $utilsObj->get_dashan_url($from_openid, $to_openid);
			$from_content = "你对".$to_info_arr['nickname']."说：\n------------------\n\n".$contents."\n\n";
			$from_content .= "<a href='{$dashan_url2}'>点此继续聊天</a>";
			$from_content .= "\n------------------\n";

			// 向搭讪者发送消息
			$utilsObj->send_custom_message($from_openid, "text", $from_content);

			if ($arrdata['errmsg'] == "ok") {
				echo "消息发送成功，请返回耐心等待对方回复";
			} else {
				echo "消息发送失败，请重试";
			}
			
		} else {
			$this->assign('from_info_arr',$from_info_arr);
			$this->assign('to_info_arr',$to_info_arr);
			$this->display();
		}
	}
	
}
