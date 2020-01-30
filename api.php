<?php

error_reporting(0);

function randString($size){
    $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    $return= "";

    for($count= 0; $size > $count; $count++){
        $return.= $basic[rand(0, strlen($basic) - 1)];
    }

    return $return;
}

function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];}

if(isset($_GET['token'])){

$token = $_GET['token'];
$url = "https://discordapp.com/api/v6/auth/register";
$email = randString(rand(10, 25));
$email = $email . "@hotmail.com";
$pass = "youshallnotpass";
$usuario = "nickname";
$invite = "your_server_invite";

$post = '{"fingerprint":"535978258924044329.hJ-YY7S3XTcsTxP2z1EhwIUZXQ4","email":"'. $email .'","username":"'. $usuario .'","password":"'. $pass .'","invite":"'. $invite .'","consent":true,"gift_code_sku_id":null,"captcha_key":"'. $token .'"}';

$proxySite = file_get_contents("your_proxy_api");
$json = json_decode($proxySite, true);
$proxy = $json['ip'] . ':' . $json['port'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: discordapp.com',
    'Connection: keep-alive',
    'X-Super-Properties: eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzcyLjAuMzYyNi4xMDkgU2FmYXJpLzUzNy4zNiIsImJyb3dzZXJfdmVyc2lvbiI6IjcyLjAuMzYyNi4xMDkiLCJvc192ZXJzaW9uIjoiMTAiLCJyZWZlcnJlciI6IiIsInJlZmVycmluZ19kb21haW4iOiIiLCJyZWZlcnJlcl9jdXJyZW50IjoiIiwicmVmZXJyaW5nX2RvbWFpbl9jdXJyZW50IjoiIiwicmVsZWFzZV9jaGFubmVsIjoic3RhYmxlIiwiY2xpZW50X2J1aWxkX251bWJlciI6MzI0NzAsImNsaWVudF9ldmVudF9zb3VyY2UiOm51bGx9',
    'X-Fingerprint: 535978258924044329.hJ-YY7S3XTcsTxP2z1EhwIUZXQ4',
    'Accept-Language: pt-BR',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36',
    'Content-Type: application/json',
    'DNT: 1',
    'Origin: https://discordapp.com',
    'Accept: */*',
    'Referer: https://discordapp.com/register?redirect_to=%2Factivity',
    'Accept-Encoding: gzip, deflate, br',
    'Cookie: _ga=GA1.2.579798001.1538409772; __cfduid=d3ec94dd9b1b19bf94cfaefcd44533c1d1538869796'
));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1); 
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$chExec = curl_exec($ch);

$discToken = getStr($chExec, '": "', '"}');

if(strlen($discToken) > 1 && strpos($discToken, "limited") === false){
    $tokenList = 'tokens.txt';
    $file = fopen($tokenList, 'a');
    fwrite($file, $discToken . "\r\n");
    fclose($file);
}
}
?>