<?php
  $kind = urlencode("蝴蝶類");
  $Cname = urlencode("灰蝶");
  $cnt = 50;
  $url = "http://api.tbn.org.tw/api/rows?ez=$kind&name=$Cname&cnt=$cnt&type=json";
  $handle = fopen($url,'rb');
  $detail = '';
  while(!feof($handle))
  {
    $detail .= fread($handle,1000000);
  }
  fclose($handle);
  $detail = json_decode($detail,true);

?>
