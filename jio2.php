<?php

$id = @$_GET['id'];
$user_ip = $_SERVER['REMOTE_ADDR'];
$currentTimestamp = time();
$portal = "tatatv.cc/";
$mac = "00:1A:79:00:2D:E2";
$deviceid = "7340326103379BD8FEA27B1C14A38307DA3D9B09104D3A673AE8185AB5A68728";
$deviceid2 = "7340326103379BD8FEA27B1C14A38307DA3D9B09104D3A673AE8185AB5A68728";
$serial = "5F00E464D4159";
$sig = "";

$n1 = "http://$portal/stalker_portal/server/load.php?type=stb&action=handshake&prehash=false&JsHttpRequest=1-xml";

$h1 = [
    "Cookie: mac=$mac; stb_lang=en; timezone=GMT",
    "X-Forwarded-For: $user_ip",
    "Referer: http://$portal/stalker_portal/c/",
    "User-Agent: Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3",
    "X-User-Agent: Model: MAG250; Link:",
];

$c1_curl = curl_init();
curl_setopt($c1_curl, CURLOPT_URL, $n1);
curl_setopt($c1_curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c1_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c1_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c1_curl, CURLOPT_HTTPHEADER, $h1);
curl_setopt($c1_curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3');
$res1 = curl_exec($c1_curl);
curl_close($c1_curl);

$response = json_decode($res1, true);
$token = $response['js']['random'];
$real = $response['js']['token'];

$h2 = [
    "Cookie: mac=$mac; stb_lang=en; timezone=GMT",
    "X-Forwarded-For: $user_ip",
    "Authorization: Bearer EACDBCF7B771D3FA6092979997E807DB",
    "Referer: http://$portal/stalker_portal/c/",
    "User-Agent: Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3",
    "X-User-Agent: Model: MAG250; Link:",
];

$n2 = "http://$portal/stalker_portal/server/load.php?type=stb&action=get_profile&hd=1&ver=ImageDescription: 0.2.18-r14-pub-250; ImageDate: Fri Jan 15 15:20:44 EET 2016; PORTAL version: 5.5.0; API Version: JS API version: 328; STB API version: 134; Player Engine version: 0x566&num_banks=2&sn=$serial&stb_type=MAG254&image_version=218&video_out=hdmi&device_id=$deviceid&device_id2=$deviceid2&signature=$sig&auth_second_step=1&hw_version=1.7-BD-00&not_valid_token=0&client_type=STB&hw_version_2=7c431b0aec69b2f0194c0680c32fe4e3&timestamp=$currentTimestamp&api_signature=263&metrics={\"mac\":\"$mac\",\"sn\":\"$serial\",\"model\":\"MAG254\",\"type\":\"STB\",\"uid\":\"$deviceid\",\"random\":\"$token\"}&JsHttpRequest=1-xml";

$c2_curl = curl_init();
curl_setopt($c2_curl, CURLOPT_URL, $n2);
curl_setopt($c2_curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c2_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c2_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c2_curl, CURLOPT_HTTPHEADER, $h2);
curl_setopt($c2_curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3');
$res2 = curl_exec($c2_curl);
curl_close($c2_curl);

$n3 = "http://$portal/stalker_portal/server/load.php?type=itv&action=create_link&cmd=ffrt%http://localhost/ch/$id&JsHttpRequest=1-xml";

$c3_curl = curl_init();
curl_setopt($c3_curl, CURLOPT_URL, $n3);
curl_setopt($c3_curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c3_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c3_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c3_curl, CURLOPT_HTTPHEADER, $h2);
curl_setopt($c3_curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3');
$res3 = curl_exec($c3_curl);
curl_close($c3_curl);

$i6 = json_decode($res3, true);
$d7 = $i6["js"]["cmd"];

header("Location: ".$d7);
die;
