# Videoparse短视频解析接口文档

## Videoparse(https://www.videoparse.cn) 解析平台：

#### 一、短视频解析接口已支持：抖音、快手、剪映、小红书、Tiktok、微博、QQ看点视频、西瓜视频、今日头条、趣头条、火锅视频、美拍、快影、微视、火山小视频、皮皮虾、好看视频、绿洲、VUE、秒拍、梨视频、刷宝、全民小视频、陌陌视频、UC浏览器、Youtube、轻视频、Bilibili、茄子短视频、灵感、WIDE、开眼、全民K歌、最右、小咖秀、皮皮搞笑、AcFun、网易云音乐、咪咕圈圈、Keep、梨涡、小影、新片场、场库、阳光宽频网、比心、逗拍等超过50个平台的短视频去水印解析。
#### 二、作者主页视频列表解析接口已支持：抖音、快手、西瓜视频、今日头条、微视、全民小视频、抖音火山版、美拍、火锅视频、好看视频、UC浏览器等。

### 一、短视频去水印解析接口
**请求地址：https://api-sv.videoparse.cn/api/customparse/parse**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
| appid | string | Y | appid |开发者后台生成的appid|
| appsecret | string | Y | appsecret |开发者后台生成的appsecret|
| url | string | Y | 要解析的短视频地址 ||

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"url":"https://v.douyin.com/JJTDEKL/","platform":"douyin","text":"特朗普又开怼了，这次是奥巴马。被问奥巴马批评其政府抗疫不力，特朗普：他是个无能的总统。","images":[],"video_info":{"cover":"https://p3.douyinpic.com/img/tos-cn-p-0015/941ca05fca954592a4ac767db260af51_1589769993~c5.jpeg?from=2563711402_large","url":"http://v5-dy-e.ixigua.com/1d37e894b3d7a62033e63585baf0277d/602285b5/video/tos/cn/tos-cn-ve-15/6e7c2c7e61c84f5fac5e398f75bb1fb0/?a=1128&br=3688&bt=922&cd=0%7C0%7C0&ch=0&cr=0&cs=0&cv=1&dr=0&ds=6&er=&l=202102072053090102121810190604F4AA&lr=&mime_type=video_mp4&pl=0&qs=0&rc=MztrOWtlbXh5dTMzZWkzM0ApaDdmPDozOmRlNzo2Zzw4OmcpaGRqbGRoaGRmc2hja2wvL2EtXy0tMy0vc3MtXmAyXmBfNTE1NTJeLmAwOmNwb2wrbStqdDo%3D&vl=&vr="},"type":2,"cover":"https://p3.douyinpic.com/img/tos-cn-p-0015/941ca05fca954592a4ac767db260af51_1589769993~c5.jpeg?from=2563711402_large"}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|platform|所属平台|所属body，如：douyin、kuaishou <a href="https://www.videoparse.cn/source" target="_blank">点击查看全部平台信息</a>||
|url|开发者请求的url|所属body||
|text|短视频文案||
|video_info|短视频封面、无水印视频地址（视频链接有效期与短视频平台有关）||
|images|图集地址||
|type|类型：1为图集，2为视频，3为图集+视频||

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
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/customparse/parse?appid=&appsecret=&url=http%3A%2F%2Fv.douyin.com%2Fa2X5ab%2F
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
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/customparse/parse?appid=appid&appsecret=appsecret&url=编码后的url
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
        api_url = "https://api-sv.videoparse.cn/api/customparse/parse?" + urllib.parse.urlencode(params)

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
	    api_url = "https://api-sv.videoparse.cn/api/customparse/parse"

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

### 二、获取作者信息接口：根据作者分享页url
**支持平台：抖音、快手、西瓜视频、今日头条、微视、全民小视频、抖音火山版、美拍、火锅视频、好看视频、UC浏览器等**  

**请求地址：https://api-sv.videoparse.cn/api/customparse/getAuthorInfo**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
| appid | string | Y | appid |开发者后台生成的appid|
| appsecret | string | Y | appsecret |开发者后台生成的appsecret|
| url | string | Y | 作者分享页url |

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"url":"https://v.douyin.com/J75cmQq/","platform":"douyin","author":{"uid":"66402061517---MS4wLjABAAAAcaWN_3-uvQOF1w13i1pQ4-iGSapsGqvtjNodeFEM3wU","short_id":"1877544343","name":"储殷教授","number":"","avatar":"https://p3.douyinpic.com/aweme/1080x1080/fb6e00060ad344e04c9c.jpeg?from=4010531038","desc":"大学教授\n《我是演说家》冠军\n奇葩说辩手\n合作vx： lynn399181\n每天中午/晚上不定期直播","follower":1970000,"focus":522,"likes":17366000,"works":241}}}
	
  
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
|likes|点赞数||
|works|作品数||

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
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/customparse/getAuthorInfo?appid=&appsecret=&url=
	$apiUrl = 'https://api-sv.videoparse.cn/api/customparse/getAuthorInfo?'.http_build_query($param);
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
	
	//得到请求的地址：https://api-sv.videoparse.cn/api/customparse/getAuthorInfo?appid=&appsecret=&url=
	$apiUrl = 'https://api-sv.videoparse.cn/api/customparse/getAuthorInfo?'.http_build_query($param);

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



### 三、获取作者作品列表
**支持平台：抖音、快手、西瓜视频、今日头条、微视、全民小视频、抖音火山版、美拍、火锅视频、好看视频、UC浏览器等**  

**请求地址：https://api-sv.videoparse.cn/api/customparse/getList**  
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

	{"code":0,"msg":"success","body":{"uid":"66402061517","platform":"douyin","page":{"current_cursor":"","next_cursor":1610861832000,"has_more":true},"list":[{"vid":"v0d00f290000c09ltb8eoev7k6qh9mpg","aweme_id":"6922981261740969216","video_info":{"desc":"#道德绑架 #道德绑架的话怼回去 拒绝道德绑架一旦滥用 就是变成人渣的开始","cover":"https://p29.douyinpic.com/img/tos-cn-p-0015/53275dd8b24a4822bd414ec391b326bb~c5.jpeg?from=2563711402_large","video_url":"http://v29.douyinvod.com/9083a794108e7f99b48c92aa5ed0cb45/6013d77e/video/tos/cn/tos-cn-ve-15/13e31ae621324afc80b169d378aa2233/?a=1128&br=4029&bt=1343&cd=0|0|0&ch=96&cr=0&cs=0&cv=1&dr=0&ds=3&er=&l=202101291637000102020492264B00638D&lr=all&mime_type=video_mp4&pl=0&qs=0&rc=anBrOTpoaGVvMzMzPGkzM0ApZzpkaWY7O2RmN2g6aDs2NWcpaGxuZDFwekBtNm5oc2w1cTZgLS0vLWFzc2A0NC8xL14wMC1hNC80XjY6Y2pxK2BtYmJeYA==&vl=&vr="},"share_url":"https://www.iesdouyin.com/share/video/6922981261740969216/","duration":66,"create_time":1611882234,"like_count":1994,"comment_count":207,"share_count":35,"to_parse":0}]}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|desc|作品视频简介||
|video_url|无水印地址||
| cover |作品视频封面||
| duration |视频时长：秒||
| like_count |点赞数||
| share_count |分享数||
| to_parse |是否需要二次解析：为0时，不需要，为1时，需要||
| next_cursor |翻页请求游标||
| has_more |是否有更多|true标识有更多，需要翻页请求，false标识无|

**接入注意点** 

	这里需要说明的是：
	1、返回的作品列表中“video_url”为无水印的视频地址，如返回“video_url”为空，如需获取无水印的视频信息，请将"share_url"为参数调用去水印解析接口
	2、当"page"下的"has_more"为"true"时，则表示下面还有内容，所需翻页获取，请将"next_cursor"作为参数"cursor",再次调用当前接口(获取作者作品列表)

### 四、获取开发者信息接口
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
