<?php
namespace Home\Controller;
use Think\Controller;

/**
* xml封装类
*/
class ReplyController extends Controller{
	
	/**
	 * 回复文本消息
	 * @param unknown $object  接收到的xml对象
	 * @param unknown $content  要回复的内容
	 * @return string  返回xml格式的内容
	 */
	public function transmitText($object,$content){
		$textTpl = "
		<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
		</xml>";
		$result = sprintf($textTpl,$object->FromUserName,$object->ToUserName,time(),$content);
		return $result;
	}

	/**
	 * 回复图片消息
	 * @param unknown $object  接收到的xml对象
	 * @param unknown $imageArray  图片信息（一维数组：MediaId）
	 * @return string  返回xml格式的内容
	 */
	public function transmitImage($object,$imageArray){
		$imageTpl = "
		<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[image]]></MsgType>
			<Image>
				<MediaId><![CDATA[%s]]></MediaId>
			</Image>
		</xml>";
		$result = sprintf($imageTpl,$object->FromUserName,$object->ToUserName,time(),$imageArray['MediaId']);
		return $result;		
	}

	/**
	 * 回复语音消息
	 * @param unknown $object  接收到的xml对象
	 * @param unknown $voiceArray  语音信息（一维数组：MediaId）
	 * @return string  返回xml格式的内容
	 */
	public function transmitVoice($object,$voiceArray){
		$voiceTpl = "
		<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[voice]]></MsgType>
			<Voice>
				<MediaId><![CDATA[%s]]></MediaId>
			</Voice>
		</xml>";
		$result = sprintf($voiceTpl,$object->FromUserName,$object->ToUserName,time(),$voiceArray['MediaId']);
		return $result;
	}

	/**
	 * 回复视频消息
	 * @param unknown $object  接收到的xml对象
	 * @param unknown $videoArray  视频信息（一维数组：MediaId，Title，Description）
	 * @return string  返回xml格式的内容
	 */
	public function transmitVideo($object,$videoArray){
		$videoTpl = "
		<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[video]]></MsgType>
			<Video>
				<MediaId><![CDATA[%s]]></MediaId>
				<Title><![CDATA[%s]]></Title>
				<Description><![CDATA[%s]]></Description>
			</Video> 
		</xml>";
		$result = sprintf($videoTpl,$object->FromUserName,$object->ToUserName,time(),$videoArray['MediaId'],$videoArray['Title'],$videoArray['Description']);
		return $result;
	}

	/**
	 * 回复图文消息
	 * @param unknown $object  接收到的xml对象
	 * @param unknown $newsArray  图文信息（二维数据：Title,Description,PicUrl,Url）
	 * @return void|string  返回xml格式的内容
	 */
	public function transmitNews($object,$newsArray){
		if (!is_array($newsArray)) {
			return;
		}
		$itemTpl = "
		<item>
			<Title><![CDATA[%s]]></Title> 
			<Description><![CDATA[%s]]></Description>
			<PicUrl><![CDATA[%s]]></PicUrl>
			<Url><![CDATA[%s]]></Url>
		</item>";
		$item_str = "";
		foreach ($newsArray as $item){
			$item_str .= sprintf($itemTpl,$item['Title'],$item['Description'],$item['PicUrl'],$item['Url']);
		}
		$newsTpl = "
		<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[news]]></MsgType>
			<ArticleCount>%s</ArticleCount>
			<Articles>
				$item_str
			</Articles>
		</xml> ";
		$result = sprintf($newsTpl,$object->FromUserName,$object->ToUserName,time(),count($newsArray));
		return $result;
	}

	/**
	 * 回复音乐消息
	 * @param unknown $object  接收到的xml对象
	 * @param unknown $musicArray  音乐信息（一维数组：Title,Description,MusicUrl,HQMusicUrl,ThumbMediaId）
	 * @return string  返回xml格式的内容
	 */
	public function transmitMusic($object,$musicArray){
		$musicTpl = "
		<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[music]]></MsgType>
			<Music>
				<Title><![CDATA[%s]]></Title>
				<Description><![CDATA[%s]]></Description>
				<MusicUrl><![CDATA[%s]]></MusicUrl>
				<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
			</Music>
			<FuncFlag>0</FuncFlag>
		</xml>";
		$result = sprintf($musicTpl,$object->FromUserName,$object->ToUserName,time(),$musicArray['Title'],$musicArray['Description'],$musicArray['MusicUrl'],$musicArray['HQMusicUrl'],$musicArray['ThumbMediaId']);
		return $result;
	}
}