<?php

$access_token = '2ba07631f6ce1627dfbcbffd70b6fa67';
 
$url = 'https://api.line.me/bot/pnp/push/verified';
 
$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$access_token}";

$arrayPostData['to'] = "0859556678";
$arrayPostData['messages'][0]['type'] = "text";
$arrayPostData['messages'][0]['text'] = "Hello World.";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
$result = curl_exec($ch);
curl_close($ch);
echo $result;
