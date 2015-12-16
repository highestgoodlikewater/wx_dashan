<?php
namespace Home\Controller;
use Think\Controller;

/**
* 微信控制类
*/
class WeixinController extends Controller{

	/* 微信消息主入口 */
	public function index(){	

		/* 调用接入校验类 */
		if (isset($_GET['echostr'])) {
			$validObj = new ValidController();
			$validObj->valid('ifree');
		}else{
			$this->responseMsg();
		}
	}

	/* 消息回复方法 */
	private function responseMsg() {
		$postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];
		
		if (!empty ( $postStr )) {
			libxml_disable_entity_loader ( true );
			
 			// 接收到的xml消息
			$object = simplexml_load_string ( $postStr, 'SimpleXMLElement', LIBXML_NOCDATA );
			$fromUsername = $object->FromUserName; // 这个就用户的openid
			$toUsername = $object->ToUserName;
			
			// 接收到的关键字
			$keyword = trim ( $object->Content );
			
			// 接收到的消息类型 (text,image,voice,video,location,link,event)
			$msgType = $object->MsgType;
			
			// 实例化回复类
			$replyObj = new ReplyController();

			// 实例化工具类
			$utilsObj = new UtilsController();

			//将未存入数据库的用户信息存入数据库，方便下次搭讪
			$utilsObj ->get_user_info($fromUsername);

			// 更新该用户的最后交互时间
			$db_userinfo = M('userinfo');
			$now_time = time();
			$db_userinfo->where(array('openid' => "$fromUsername"))->save(array("last_time"=>$now_time));

			
			switch ($msgType) {
				case 'text' :// 文本消息处理
					if ($keyword == "搭讪客服") {
						$content = $utilsObj->dashan("客服", $fromUsername);
					} elseif ($keyword == "搭讪汉子") {
						$content = $utilsObj->dashan("汉子", $fromUsername);
					} elseif ($keyword == "搭讪妹子") {
						$content = $utilsObj->dashan("妹子", $fromUsername);
					} elseif ($keyword == "搭讪") {
						$content = $utilsObj->dashan("搭讪", $fromUsername);
					} elseif (preg_match ( '/@((.*?))/', $keyword )) {
						$content = $utilsObj->dashan_send_msg($keyword, $fromUsername);
					}


				break;
				
				case 'image' :// 图片消息处理

				break;
				
				case 'voice' :// 声音消息处理

				break;
				
				case 'video' :// 视频消息处理

				break;
				
				case 'location' :// 地理消息处理

				break;
				
				case 'event' :// 事件消息处理
				$eventType = $object->Event; //取出事件的类型
				switch ($eventType){
					case 'subscribe' : // 关注事件

					break;
					case 'SCAN': // 扫码事件

					break;
					case 'unsubscribe' : // 取消关注事件

					break;
					case 'LOCATION' : // 地址上报事件

					break;
					case 'CLICK' : // 自定义菜单点击事件
					$eventKey = $object->EventKey;
					switch ($eventKey) {
						case "" :

						break;
					}
					break;
				}
				break;
			}
			echo $replyObj->transmitText ( $object, $content );
		} else {
			echo "";
			exit ();
		}
	}
}