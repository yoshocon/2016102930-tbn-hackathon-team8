<?php
  $url = 'http://api.tbn.org.tw/api/Categories';
  $handle = fopen($url,'rb');
  $content = '';
  while(!feof($handle))
  {
    $content .= fread($handle,1000000);
  }
  fclose($handle);

  $content = json_decode($content);

?>
