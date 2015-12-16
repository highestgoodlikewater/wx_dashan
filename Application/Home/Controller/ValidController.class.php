<?php
namespace Home\Controller;
use Think\Controller;

/**
* 微信接入校验类
*/
class ValidController extends Controller{
	
	public function valid($token){
		$echoStr = $_GET["echostr"];
		
		if($this->checkSignature($token)){
			echo $echoStr;
			exit;
		}
	}

	private function checkSignature($token){
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
		
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}