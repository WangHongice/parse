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
