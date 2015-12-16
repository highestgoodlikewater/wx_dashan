<?php
namespace Home\Controller;
use Think\Controller;

/**
* 工具类
*/
class UtilsController extends Controller{

	// 取得搭讪url
	public function get_dashan_url($from_openid, $to_openid){
		return "http://www.ifreehand.sinaapp.com/index.php/Home/Dashan/index/from_openid/{$from_openid}/to_openid/{$to_openid}";
	}

	// 搭讪的@回复方法
	public function dashan_send_msg($keyword, $fromopenid){
		$keyword2 = str_replace ( "@", "", $keyword );

		$db_userinfo = M('userinfo');
		$from_userinfo_arr = $db_userinfo->where(array("openid" => "{$fromopenid}"))->find();

		$to_user = $from_userinfo_arr['to_user'];
		$to_userinfo_arr = $db_userinfo->where(array("openid" => "{$to_user}"))->find();
		// 被搭讪者openid
		$to_openid = $to_userinfo_arr['openid'];

		// dump($to_userinfo_arr);
		// dump($from_userinfo_arr);


		//搭讪者openid
		$from_openid = $from_userinfo_arr['openid'];
		//搭讪者所在城市
		$from_city = $from_userinfo_arr['city'] != null? "来自".$from_userinfo_arr['city']."的":"";
		//搭讪者性别
		$from_sex = $from_userinfo_arr['sex'] == 1? "汉子👦":"妹子👧";
		//搭讪者昵称
		$from_nickname = $from_userinfo_arr['nickname'];
		// 搭讪url
		$dashan_url = $this->get_dashan_url($to_openid, $from_openid);

		// 拼接要发送的消息
		$to_content = $from_city.$from_nickname.$from_sex;
		$to_content .= "向你发来消息：\n------------------\n\n" . $keyword2 . "\n\n";
		$to_content .= "<a href='{$dashan_url}'>点此回复</a>";
		$to_content .= "\n------------------\n";
		$to_content .= "发送“@+你想说的话”可以快速回复ta哦[色]";

		// 向被搭讪者发送消息
		$this->send_custom_message($to_openid, "text", $to_content);

		// 向被搭讪者绑定搭讪信息
		$db_userinfo->where(array("openid" => "{$to_openid}"))->save(array("to_user" => "{$from_openid}"));

		return "消息发送成功，请耐心等待回复……";

	}

	// 搭讪方法，$type为搭讪的对象类型（搭讪、汉子、妹子、客服）
	public function dashan($type, $fromopenid){
		// 间隔时间
		$jtime = time()-127800;
		// 用户个人信息表
		$db_userinfo = M('userinfo');

		switch ($type) {
			case '客服': //搭讪客服

			$map['flag'] = 1;
			$map['last_time'] = array('gt', $jtime);
			$kefu_arr = $db_userinfo->where($map)->order('last_time desc')->select();
			
			if (!empty($kefu_arr)) { //有客服人员
				// 随机取出一位客服人员
				$kefu_num = rand(0, count($kefu_arr)-1);
				$kefu_openid = $kefu_arr[$kefu_num]['openid'];

				// 将客服openid与搭讪者绑定
				$db_userinfo->where(array("openid" => "{$fromopenid}"))->save(array("to_user" => "{$kefu_openid}"));

				// 搭讪url
				$dashan_url = $this->get_dashan_url($fromopenid, $kefu_openid);

				//回复提示消息
				$from_content = "亲，客服".$kefu_arr[$kefu_num]['nickname']."为你服务";
				$from_content .= "\n\n";
				$from_content .= "<a href='{$dashan_url}'>点此聊天</a>";
				$from_content .= "\n---------------\n";
				$from_content .= "或直接回复@+你的问题，快速联系我\n如：@你好";
				return $from_content;

			}else{ //没有客服人员
				// 回复提示消息
				$from_content = "亲，客服忙，请稍候再试……";
				return $from_content;
			}

			break;

			case '汉子': //搭讪汉子
			$map['sex'] = 1;
			$map['last_time'] = array('gt', $jtime);
			$man_arr = $db_userinfo->where($map)->order('last_time desc')->select();

			if (!empty($man_arr)) {
				// 随机取出一位汉子
				$man_num = rand(0, count($man_arr)-1);
				
				// 被搭讪者openid
				$man_openid = $man_arr[$man_num]['openid'];
				
				// 被搭讪者昵称
				$man_nickname = $man_arr[$man_num]['nickname'];

				// 被搭讪者所在地
				$man_city = $man_arr[$man_num]['city'] != null? "来自".$man_arr[$man_num]['city']."的":"";;
				
				// 被搭讪者性别
				$man_sex = "汉子👦";

				// 被搭讪者最后交互时间
				$last_time = date ( "Y-m-d H:i:s", $man_arr[$man_num]['last_time'] );

				// 将他的openid与搭讪者绑定
				$db_userinfo->where(array("openid" => "{$fromopenid}"))->save(array("to_user" => "{$man_openid}"));

				// 搭讪url
				$dashan_url = $this->get_dashan_url($fromopenid, $man_openid);

				//回复提示消息
				$from_content = "成功匹配到".$man_city.$man_nickname.$man_sex."\n\n";
				$from_content .= "ta最后一次会话时间：\n" . $last_time . "\n\n";
				$from_content .= "<a href='{$dashan_url}'>点此聊天</a>";
				$from_content .= "\n---------------\n";
				$from_content .= "发送“@+你想说的话”可直接发消息给ta哦[色]\n---------------\n";
				$from_content .= "[玫瑰]多与平台互动可以提高被搭讪的机率哦";

				return $from_content;
			} else {
				$from_content = "亲，帅哥们都不在线，请稍候再试……";
			}

			break;

			case '妹子': //搭讪妹子
			$map['sex'] = 2;
			$map['last_time'] = array('gt', $jtime);
			$woman_arr = $db_userinfo->where($map)->order('last_time desc')->select();

			if (!empty($woman_arr)) {
				// 随机取出一位妹子
				$woman_num = rand(0, count($woman_arr)-1);
				
				// 被搭讪者openid
				$woman_openid = $woman_arr[$woman_num]['openid'];
				
				// 被搭讪者昵称
				$woman_nickname = $woman_arr[$woman_num]['nickname'];

				// 被搭讪者所在地
				$woman_city = $woman_arr[$woman_num]['city'] != null? "来自".$woman_arr[$woman_num]['city']."的":"";;
				
				// 被搭讪者性别
				$woman_sex = "妹子👧";

				// 被搭讪者最后交互时间
				$last_time = date ( "Y-m-d H:i:s", $woman_arr[$woman_num]['last_time'] );

				// 将她的openid与搭讪者绑定
				$db_userinfo->where(array("openid" => "{$fromopenid}"))->save(array("to_user" => "{$woman_openid}"));

				// 搭讪url
				$dashan_url = $this->get_dashan_url($fromopenid, $woman_openid);

				//回复提示消息
				$from_content = "成功匹配到".$woman_city.$woman_nickname.$woman_sex."\n\n";
				$from_content .= "ta最后一次会话时间：\n" . $last_time . "\n\n";
				$from_content .= "<a href='{$woman_openid}'>点此聊天</a>";
				$from_content .= "\n---------------\n";
				$from_content .= "发送“@+你想说的话”可直接发消息给ta哦[色]\n---------------\n";
				$from_content .= "[玫瑰]多与平台互动可以提高被搭讪的机率哦";

				return $from_content;
			} else {
				$from_content = "亲，美女们都不在线，请稍候再试……";
				return $from_content;
			}

			break;

			case '搭讪'://随机匹配搭讪者
			$map['last_time'] = array('gt', $jtime);
			$man_arr = $db_userinfo->where($map)->order('last_time desc')->select();

			if (!empty($man_arr)) {
				// 随机取出一位关注者
				$man_num = rand(0, count($man_arr)-1);
				
				// 被搭讪者openid
				$man_openid = $man_arr[$man_num]['openid'];
				
				// 被搭讪者昵称
				$man_nickname = $man_arr[$man_num]['nickname'];

				// 被搭讪者所在地
				$man_city = $man_arr[$man_num]['city'] != null? "来自".$man_arr[$man_num]['city']."的":"";;
				
				// 被搭讪者性别
				$man_sex = $man_arr[$man_num]['sex'] == 1?"汉子👦":"妹子👧";

				// 被搭讪者最后交互时间
				$last_time = date ( "Y-m-d H:i:s", $man_arr[$man_num]['last_time'] );

				// 将他的openid与搭讪者绑定
				$db_userinfo->where(array("openid" => "{$fromopenid}"))->save(array("to_user" => "{$man_openid}"));

				// 搭讪url
				$dashan_url = $this->get_dashan_url($fromopenid, $man_openid);

				//回复提示消息
				$from_content = "成功匹配到".$man_city.$man_nickname.$man_sex."\n\n";
				$from_content .= "ta最后一次会话时间：\n" . $last_time . "\n\n";
				$from_content .= "<a href='{$dashan_url}'>点此聊天</a>";
				$from_content .= "\n---------------\n";
				$from_content .= "发送“@+你想说的话”可直接发消息给ta哦[色]\n---------------\n";
				$from_content .= "[玫瑰]多与平台互动可以提高被搭讪的机率哦";

				return $from_content;
			} else {
				$from_content = "亲，ta们都不在线，请稍候再试……";
			}
			break;
		}
	}

	//发送客服消息，已实现发送文本，其他类型可扩展
	public function send_custom_message($touser, $type, $data){
		$msg = array('touser' =>$touser);
		switch($type){
			case 'text':
			$msg['msgtype'] = 'text';
			$msg['text']    = array('content'=>urlencode($data));
			break;
		}
		$access_token = $this->get_access_token();
		$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";
		return $this->https_request($url, urldecode(json_encode($msg)));
	}

	/* 搭讪初始化方法，拉取所有已经关注的用户信息并存入数据库*/
	public function get_all_userinfo(){
		$success_num = 0; //导入数据库成功个数
		$fail_num = 0; //导入数据库失败个数

		$data = $this->get_user_list();
		$openid_arr = $data['data']['openid'];  // openid列表
		$total = $data['total']; //关注该微信的总用户数

		echo "<meta charset='utf-8'>";
		echo "<h2>已关注该微信的总用户数为：".$total."</h2>";
		foreach ($openid_arr as $key => $openid) {
			if($this->get_user_info($openid)){
				echo "<h2>第".$key."个用户导入数据库成功，openid为：".$openid.'</h2><br>';
				$success_num ++;
			}else{
				echo "<h2>第".$key."个用户导入数据库失败，openid为：".$openid.'</h2><br>';
				$fail_num ++;
			}
		}

		echo "<h2>程序拉取结束……</h2>";
		echo "<h2>数据导入成功：$success_num 个<br>数据导入失败：$fail_num 个</h2>";
	}


	/* 获取关注者用户列表 */
	public function get_user_list($next_openid = NULL){
		$access_token = $this->get_access_token();
		$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}&next_openid={$next_openid}";
		$res = $this->https_request($url);
		return json_decode($res, true);
	}

	/* 获取用户基本信息并存入数据库 */
	public function get_user_info($openid){

		// 查看用户个人信息是否已经存在
		$db_userinfo = M('userinfo');
		$userinfo_arr = $db_userinfo->where(array('openid' => "$openid"))->find();
		
		// 如果用户个人信息不存在,将用户个人信息存入数据库
		if ($userinfo_arr == NULL) {
			$access_token = $this->get_access_token();
			$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang=zh_CN";
			$jsondata = file_get_contents($url);
			$arrdata = json_decode($jsondata,true);
			return $db_userinfo->data($arrdata)->add();
		}else{
			return true;
		}

	}

	/* 获取微信号access_token */
	public function get_access_token(){

		$db_accesstoken = M('accesstoken');
		$now_time = time(); //得到现在时间戳

		$access_token_info = $db_accesstoken->where("id=1")->find();
		$access_token = $access_token_info['access_token'];
		$utime = $access_token_info['utime'];
		
		/* 
		 * 判断access_token是否过期（官方过期时间为2个小时）
		 * 如果过期则重新获取access_token
		*/
		if (($now_time-$utime) >= 7200) {

			// 微信公众号标识
			$appid = "wx53ea55c0f283a331";
			$secret = "197d4eb040a5b76a7a5cf6b6b80a0be6";

			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
			$data = file_get_contents($url);
			// echo $data;
			$jsondata = json_decode($data,true);
			$access_token = $jsondata["access_token"];

			/* 更新accesstoken表中数据 */
			$data2 = array("access_token"=>$access_token,"utime"=>$now_time);
			$db_accesstoken->where('id=1')->save($data2);
		}
		return $access_token;
	}

	/* curl模拟请求 */
	public function https_request($url, $data = null){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
}