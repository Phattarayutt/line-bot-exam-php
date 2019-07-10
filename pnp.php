<?php 
echo 'updated:11:47 <hr>';
$accessToken = "2ba07631f6ce1627dfbcbffd70b6fa67";  
   
   
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
 
   $phone_number = '0859556678'; 
   
   $arrayPostData['to'] =  $phone_number ;
   $arrayPostData['messages'][0]['type'] = "text";
   $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา"; 
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
