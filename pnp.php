<?php 

$accessToken = "UO6G7Y2b4ncvobT97WFaVxtqIunHXejnEcd2Fsltb++EunycZH2bgnp8u/4O1AxMduis8Ci2cf6s3+nRkkZ/2Yvck+q6JP4pYDEl8CdtUyYDqMA/6m5B/qGNR8IEtdO4lyn0uA1VWBJZUPCAkS2wJgdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
 
   $phone_number = '0859556678'; 
   
   $arrayPostData['to'] =  $phone_number ;
   $arrayPostData['messages'][0]['type'] = "text";
   $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา"; 
   pushMsg($arrayHeader,$arrayPostData);
    
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "	https://api.line.me/bot/pnp/push/verified";
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
   }
   exit;
?>
