<?php 
 
   $accessToken = "vJZew/1WKkbayG4Cj0X9p/To6gcTOFPhSfYKL8jsAxWHaVip1mgTdYpw5DG7BpIpUbQX5/yA20gmrjAvk7ZJqiJnHwjHGImzFX7qMmt8klny2DgeU4vV5R26DFlu2Rltv8AErV26tU3/uURt221gfQFIS9xybk1bpjJUhI9NTk0=";  
    
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
 


   $phone_number = hash('sha256', '0859556678' ) ; 
   
   $arrayPostData['to'] =  $phone_number ;
   $arrayPostData['messages'][0]['type'] = "text";
   $arrayPostData['messages'][0]['text'] = "Hello"; 
   
   pushMsg($arrayHeader,$arrayPostData);
    
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/bot/pnp/push/verified";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
      
      echo $result;
   }
   exit;
?>
