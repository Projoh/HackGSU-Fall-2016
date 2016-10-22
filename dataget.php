<?php 
 
 $url = 'http://www.google.com/';
 
 
 $ch = curl_init();
 
 curl_setopt($ch, CURLOPT_URL, $url);
 
 
 
 $output = curl_exec($ch);
 
 if($output === FALSE){
	 echo "cURL Error" . curl_error($ch);
 }
	
?>