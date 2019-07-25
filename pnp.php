<?php 
 
   $accessToken = "vJZew/1WKkbayG4Cj0X9p/To6gcTOFPhSfYKL8jsAxWHaVip1mgTdYpw5DG7BpIpUbQX5/yA20gmrjAvk7ZJqiJnHwjHGImzFX7qMmt8klny2DgeU4vV5R26DFlu2Rltv8AErV26tU3/uURt221gfQFIS9xybk1bpjJUhI9NTk0=";  
    
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
 


   $phone_number = hash('sha256', '+66835551569' ) ; 
 
 
   
$arrayPostData['to'] =  $phone_number  ;
   $arrayPostData['messages'][0]['type'] = "text";
   $arrayPostData['messages'][0]['text'] = "Welcome to Phone Number Push"; 
   
   //pushMsg($arrayHeader,$arrayPostData);
    
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/bot/pnp/push/verified');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($arrayPostData) );
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);

$headers = array();
$headers[] =  "Authorization: Bearer {$accessToken}" ;
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
echo $result;

   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/bot/pnp/push/verified";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
      
      echo $result;
   }
   exit;
?>
