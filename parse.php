<?php
/**
 * 
 * Videoparse(https://www.videoparse.cn)
 * 支持： 抖音、快手、剪映、小红书、Tiktok、微博、QQ看点视频、西瓜视频、今日头条、趣头条、火锅视频、美拍、微视、
 * 火山小视频、皮皮虾、好看视频、绿洲、VUE、秒拍、梨视频、刷宝、全民小视频、陌陌视频、UC浏览器、Youtube、轻视频、
 * Bilibili、茄子短视频、灵感、WIDE、开眼、全民K歌、最右、小咖秀、皮皮搞笑、AcFun、网易云音乐、咪咕圈圈、梨涡、
 * 小影、新片场、场库、阳光宽频网等超过40个平台的短视频去水印解析。
 *
 * 解析短视频接口
 */

/**
* file_get_contents方式
*/
//开发者后台生成的appid
$appId = '';

//开发者后台生成的appsecret
$appSecret = '';

//需要解析的url
$url = '';

$param = [
	'appid'		=> $appId,
	'appsecret'	=> $appSecret,
	'url'		=> $url,
];

//得到请求的地址：https://api-sv.videoparse.cn/api/customparse/parse?appid=2m3Ju99MPXrNtkgH&appsecret=bNG3JYjT83qp4cib&url=http%3A%2F%2Fv.douyin.com%2Fa2X5ab%2F
$apiUrl = 'https://api-sv.videoparse.cn/api/customparse/parse?'.http_build_query($param);
$videoInfo = file_get_contents($apiUrl);
print_r($videoInfo);

/**
* curl 方式
*/
//开发者后台生成的appid
$appId = '';

//开发者后台生成的appsecret
$appSecret = '';

//需要解析的url
$url = '';

$param = [
	'appid'		=> $appId,
	'appsecret'	=> $appSecret,
	'url'		=> $url,
];

//得到请求的地址：https://api-sv.videoparse.cn/api/customparse/parse?appid=appid&appsecret=appsecret&url=编码后的url
$apiUrl = 'https://api-sv.videoparse.cn/api/customparse/parse?'.http_build_query($param);

$ch = curl_init();
curl_setopt ( $ch, CURLOPT_URL, $apiUrl );
curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
curl_setopt ( $ch, CURLOPT_MAXREDIRS, 5 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
$content = curl_exec( $ch );
curl_close ( $ch);

print_r($content);


