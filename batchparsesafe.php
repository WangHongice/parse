<?php

/**
* 作者主页作品列表批量解析安全版
* 第一步：获取作者信息
* 第二步：获取作品列表
*
*/
//开发者后台生成的appid
$appId = '';

//开发者后台生成的appsecret
$appSecret = '';

//需要解析的url
$url = 'https://v.douyin.com/JwM54Fx/';

//时间戳
$timestamp = time();

//curl post 获取作者信息
$param = [
	'appid'		=> $appId,
	'url'		=> $url,
	'timestamp'	=> $timestamp,
];

//生成签名
$sign = sign($param, $appSecret);

$param['sign'] = $sign;

$apiUrl = 'https://api-sv.videoparse.cn/api/safeparse/getAuthorInfo';
$authorRes = curlPost($apiUrl, $param);

$authorInfo = json_decode($authorRes, true);

$param = [
	'appid'		=> $appId,
	'uid'		=> $authorInfo['body']['author']['uid'],
	'platform'	=> $authorInfo['body']['platform'],
	'timestamp'	=> $timestamp,
	'cursor'	=> '',
];

//生成签名
$sign = sign($param, $appSecret);

$param['sign'] = $sign;


$apiUrl = 'https://api-sv.videoparse.cn/api/safeparse/getList';
$listRes = curlPost($apiUrl, $param);

$listInfo = json_decode($listRes, true);

print_r($listInfo);


function curlPost( $url = '', $data ) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url );
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //部分环境下，需要将参数值设为2，即：curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$response = curl_exec( $ch );
	curl_close ( $ch );

	return $response;	
}


/**
 * 生成签名
 * @param array $param
 */
function sign($param = [], $appSecret = '') {
	ksort($param);
	return substr(md5(substr(md5(urldecode(http_build_query($param))), 6, 18) . $appSecret), 10, 16);
}
