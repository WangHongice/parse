# Videoparse短视频解析接口文档

## Videoparse(https://www.videoparse.cn) 短视频解析接口已支持：抖音、快手、剪映、小红书、Tiktok、微博、QQ看点视频、西瓜视频、今日头条、趣头条、火锅视频、美拍、快影、微视、火山小视频、皮皮虾、好看视频、绿洲、VUE、秒拍、梨视频、刷宝、全民小视频、陌陌视频、UC浏览器、Youtube、轻视频、Bilibili、茄子短视频、灵感、WIDE、开眼、全民K歌、最右、小咖秀、皮皮搞笑、AcFun、网易云音乐、咪咕圈圈、Keep、梨涡、小影、新片场、场库、阳光宽频网、比心、逗拍等超过50个平台的短视频去水印解析。


### 一. 短视频去水印解析接口
**请求地址：https://api-sv.videoparse.cn/api/video/normalParse**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
| appid | string | Y | appid |开发者后台生成的appid|
| appsecret | string | Y | appsecret |开发者后台生成的appsecret|
| url | string | Y | 要解析的短视频地址 ||

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"source":"douyin","url":"http:\/\/v.douyin.com\/2duavD\/","title":"\u767e\u5c81\u5c71\u4e3a\u4ec0\u4e48\u79f0\u4e3a\u6c34\u4e2d\u8d35\u65cf \u89c6\u9891\u5bfb\u627e\u7b54\u6848@\u6296\u97f3\u5c0f\u52a9\u624b","cover_url":"https:\/\/p1.pstatp.com\/large\/1bda8000852aa26656c12.jpg","video_url":"http:\/\/v6-dy.ixigua.com\/2c3a7f072b949101ceac0d465b35ef82\/5ca88513\/video\/m\/2203c9cfb2a446e4c99bb6b34927f3e875911619893d00005d48e8bf9a57\/?rc=am13aWg5bnlobDMzN2kzM0ApQHRAbzM2NzU1ODkzNDo1Ojk3PDNAKXUpQGczdylAZmxkamV6aGhkZjs0QDVecWBkb15pLV8tLWItL3NzLW8jbyM2LzYtLi0uLS0yMi4tLS4vaTpiLW8jOmAtbyNtbCtiK2p0OiMvLl4=","video_key":"ZRGO3V1JNKJ270QWE5"}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|source|解析视频来源，如：douyin、kuaishou|[点击查看全部平台信息](https://www.videoparse.cn/source)|
|url|开发者请求的url||
|title|短视频标题||
|cover_url|短视频封面||
|video_url|无水印的视频地址|此地址有有效期限制，不可作为永久存储|

PHP EXAMPLE：

PHP file\_get\_contents:
	
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
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/video/normalParse?appid=&appsecret=&url=http%3A%2F%2Fv.douyin.com%2Fa2X5ab%2F
	$apiUrl = 'https://api-sv.videoparse.cn/api/video/normalParse?'.http_build_query($param);
	$videoInfo = file_get_contents($apiUrl);
	print_r($videoInfo);


PHP curl为例：
	
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
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/video/normalParse?appid=appid&appsecret=appsecret&url=编码后的url
	$apiUrl = 'https://api-sv.videoparse.cn/api/video/normalParse?'.http_build_query($param);
	
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


Python实例代码:

  
    #!/usr/bin/env python
    # encoding: utf-8

    import requests, urllib, json

    appId = ""
    appSecret = ""
    params = {
       "appid": appId,
       "appsecret": appSecret,
       "url":"",
    }
	def get(url):
        params["url"] = url;
        api_url = "https://api-sv.videoparse.cn/api/video/normalParse?" + urllib.parse.urlencode(params)

        msg = {"code": 0, "msg": "", "body": ""}

        response = requests.get(url=api_url, timeout=30)

        if response.status_code != 200:
		 	msg['code'] = 1
		 	msg["msg"] = "请求出现问题"
		 	return msg
	    # result = json.loads(response.text)      如果你直接拿到系统中使用请将返回参数直接转为json
	   	result = response.text  # 如果你不需要转换json，则直接接受数据并返回
	   	return result


	def post(url):
	    params["url"] = url
	    api_url = "https://api-sv.videoparse.cn/api/video/normalParse"

	    msg = {"code": 0, "msg": "", "body": ""}

	    response = requests.post(url=api_url, data=params, timeout=30)
	    if response.status_code != 200:
		 	msg['code'] = 1
		  	msg["msg"] = "请求出现问题"
		  	return msg
	    # result = json.loads(response.text)      如果你直接拿到系统中使用请将返回参数直接转为json
	    result = response.text  # 如果你不需要转换json，则直接接受数据并返回
	    return result

	##print(get("https://v.douyin.com/JJTDEKL/"))
	#print(post("https://v.douyin.com/JJTDEKL/"))


### 二. 短视频去水印解析接口 - 安全版
**URL：https://api-sv.videoparse.cn/api/video/parse**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
| appid | string | Y | appid |开发者后台生成的appid|
| url | string | Y | 要解析的短视频地址 |
| timestamp | string | Y | 时间戳 | 秒数时间戳 |
| sign | string | Y | 参数签名 | 通过签名算法生成(部分语言如:c#，md5后得到的是大写的字符串，需将每次md5加密后的字符串转换为小写) |

**签名算法验证 <a href="https://www.videoparse.cn/home/checkSign">签名验证</a>**

签名算法：

	假设传入的参数如下：
	appid: 26jJu99MPXrNtkgH
	url： http://v.douyin.com/2duavD/
	timestamp：1546766273
	appsecret: mtUjY1z2D7TiZDqb
	
	注意：部分语言(例如:c#)，字符串通过md5加密后，得到的为大写的字符串，请将每次md5加密后得到的字符串转换为小写
	
	签名步骤如下：
	
	第一步：对参数按照key=value的格式，并按照参数名ASCII字典序排序如下(格式为：appid=appid&amp;timestamp=秒级时间戳&url=编码后的短视频地址，注意：需要先对传入url值进行编码):
	stringA=&quot;appid=26jJu99MPXrNtkgH&amp;timestamp=1546766273&url=http%3A%2F%2Fv.douyin.com%2F2duavD%2F&quot;
	
	第二步：将stringA进行MD5加密，然后从第6位开始，截取18位，拼接上API密钥，成为新的字符串stringB:
	stringB=substr(md5(stringA), 6, 18).appsecret    //	得到：439cb914566659b146mtUjY1z2D7TiZDqb
	
	第三步:将stringB进行MD5加密后，从10位开始，截取16位，得到最终的签名字符串sign：
	sign = substr(md5(stringB), 10, 16)
	
	得到结果：
		a22919cc4d9eafce
	
	PHP 实现的签名算法代码：
	
	function sign($appId, $appSecret, $url, $timestamp) {
		$param = [
			'appid'		=> $appId,
			'url'		=> $url,
			'timestamp'	=> $timestamp,
		];
		ksort($param);
		return substr(md5(substr(md5(http_build_query($param)), 6, 18) . $appSecret), 10, 16);
	}
	

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"source":"douyin","url":"http:\/\/v.douyin.com\/2duavD\/","title":"\u767e\u5c81\u5c71\u4e3a\u4ec0\u4e48\u79f0\u4e3a\u6c34\u4e2d\u8d35\u65cf \u89c6\u9891\u5bfb\u627e\u7b54\u6848@\u6296\u97f3\u5c0f\u52a9\u624b","cover_url":"https:\/\/p1.pstatp.com\/large\/1bda8000852aa26656c12.jpg","video_url":"http:\/\/v6-dy.ixigua.com\/2c3a7f072b949101ceac0d465b35ef82\/5ca88513\/video\/m\/2203c9cfb2a446e4c99bb6b34927f3e875911619893d00005d48e8bf9a57\/?rc=am13aWg5bnlobDMzN2kzM0ApQHRAbzM2NzU1ODkzNDo1Ojk3PDNAKXUpQGczdylAZmxkamV6aGhkZjs0QDVecWBkb15pLV8tLWItL3NzLW8jbyM2LzYtLi0uLS0yMi4tLS4vaTpiLW8jOmAtbyNtbCtiK2p0OiMvLl4=","video_key":"ZRGO3V1JNKJ270QWE5"}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|source|解析视频来源，如：douyin、kuaishou|[点击查看全部平台信息](https://www.videoparse.cn/source)|
|url|开发者请求的url||
|title|短视频标题||
|cover_url|短视频封面||
|video_url|无水印的视频地址|此地址有有效期限制，不可作为永久存储|

PHP EXAMPLE：

	function curlPost( $url = '', $data ) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1); //部分环境下，需要将参数值设为2，即：curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
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
	
	function sign($appId, $appSecret, $url, $timestamp) {
		$param = [
			'appid'		=> $appId,
			'url'		=> $url,
			'timestamp'	=> $timestamp,
		];
		ksort($param);
		return substr(md5(substr(md5(http_build_query($param)), 6, 18) . $appSecret), 10, 16);
	}
	
	//开发者后台生成的appid
	$appId = '';
	
	//开发者后台生成的appsecret
	$appSecret = '';
	
	//需要解析的url
	$url = '';
	
	//时间戳
	$timestamp = time();
	
	//生成签名
	$sign = sign($appId, $appSecret, $url, $timestamp);
	
	//curl post请求接口解析短视频
	$param = [
		'appid'		=> $appId,
		'url'		=> $url,
		'timestamp'	=> $timestamp,
		'sign'		=> $sign,
	];
	
	$apiUrl = 'https://api-sv.videoparse.cn/api/video/parse';
	$videoInfo = curlPost($apiUrl, $param);
	print_r($videoInfo);


### 三. 获取作者信息接口：根据作者分享页url(支持抖音、快手、西瓜视频、微视、抖音火山版、美拍、火锅视频、好看视频、UC浏览器等)
**请求地址：https://api-sv.videoparse.cn/api/batch/getAuthorInfo**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
| appid | string | Y | appid |开发者后台生成的appid|
| appsecret | string | Y | appsecret |开发者后台生成的appsecret|
| url | string | Y | 作者分享页url |

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"number":"kanzhengzhou","platform":"douyin","author":{"uid":"56009474501","name":"看郑州","number":"kanzhengzhou","avatar":"https://p6-dy-ipv6.byteimg.com/aweme/1080x1080/2f96500065722b0ab49e2.jpeg?from=4010531038","desc":"看郑州，观天下！","follower":360000,"focus":61}}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|uid|作者uid||
|name|昵称||
|number|抖音号||
|avatar|头像|
|desc|简介||
|follower|粉丝数||
|focus|关注数||

PHP EXAMPLE：

PHP file\_get\_contents:
	
	//开发者后台生成的appid
	$appId = '';
	
	//开发者后台生成的appsecret
	$appSecret = '';
	
	//需要解析的短视频平台作者分享页url
	$url= '';
	
	$param = [
		'appid'		=> $appId,
		'appsecret'	=> $appSecret,
		'url'		=> $url,
	];
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/batch/getAuthorInfo?appid=&appsecret=&url=
	$apiUrl = 'https://api-sv.videoparse.cn/api/batch/getAuthorInfo?'.http_build_query($param);
	$videoInfo = file_get_contents($apiUrl);
	print_r($videoInfo);


PHP curl为例：
	
	//开发者后台生成的appid
	$appId = '';
	
	//开发者后台生成的appsecret
	$appSecret = '';
	
	//需要解析的短视频平台作者分享页url
	$url= '';
	
	$param = [
		'appid'		=> $appId,
		'appsecret'	=> $appSecret,
		'url'		=> $url,
	];
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/batch/getAuthorInfo?appid=&appsecret=&url=
	$apiUrl = 'https://api-sv.videoparse.cn/api/batch/getAuthorInfo?'.http_build_query($param);
	
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



### 四. 获取作者作品列表(目前支持抖音、快手、西瓜视频、微视、抖音火山版、美拍、火锅视频、好看视频、UC浏览器等)
**请求地址：https://api-sv.videoparse.cn/api/batch/getList**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
| appid | string | Y | appid |开发者后台生成的appid|
| appsecret | string | Y | appsecret |开发者后台生成的appsecret|
| uid | string | Y | 作者uid(作者信息接口中返回) |
| platform | string | Y | 平台信息(作者信息接口中有返回) |
| cursor | string | N |上一次调用此接口中返回的"next_cursor"|

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"uid":"56009474501","platform":"douyin","page":{"current_cursor":"","next_cursor":1601703325000,"has_more":true},"list":[{"video_info":{"desc":"豪华婚礼现天价陪嫁礼单：现金280多万加创业基金2000多万，外加豪车、房产…数学好的可以算一下总价值！","url":"https://www.iesdouyin.com/share/video/6879811223831989517/","cover":"https://p3-dy-ipv6.byteimg.com/img/tos-cn-p-0015/e932dc887539471cb745f712aada2176_1601830891~c5_300x400.jpeg?from=2563711402_large"},"like_count":5956,"comment_count":25}]}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|desc|作品视频简介||
|url|视频网页地址||
| cover |作品视频封面||
| like_count |点赞数||
| next_cursor |翻页请求游标||
| has_more |是否有更多|true标识有更多，需要翻页请求，false标识无|

**接入注意点** 

	这里需要说明的是：
	1、返回的作品列表中视频url为有水印的视频网页访问地址，如需获取无水印的视频原始信息，请将当前获取的视频地址作为参数调用去水印解析接口
	2、当"page"下的"has_more"为"true"时，则表示下面还有内容，所需翻页获取，请将"next_cursor"作为参数"cursor",再次调用当前接口(获取作者作品列表)

### 五. 获取开发者信息接口
**URL：https://api-sv.videoparse.cn/api/user/getInfo**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---| 
| appid | string | Y | appid |开发者后台生成的appid|

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"username":"test","appid":"2m3Ju99MPXrNtkgH","end_time":"1525931778","wallet":"100"}}
	
**失败：**

{"code":10001,"msg":"parameter lost","body":[]}

返回字段注释

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|username|开发用户名||
|appid|appid||
|end_time|vip到期时间||
|wallet|剩余解析次数||

### 错误码说明
|错误码|注释|
|---|---|
|code|错误码|
|0|解析成功|
|10001|请求参数缺失|
|10002|请求参数不合法|
|10003|开发者权限错误或开发者不存在|
|10004|签名校验失败|
|10005|请求接口的ip地址不在白名单或开发者没有设置ip白名单|
|10006|当前开发者不是vip或没有解析次数|
|10007|解析视频失败|
|10008|请求参数url地址不合法|
|10009|请求受限|
|10010|vip已过期或无解析次数|
