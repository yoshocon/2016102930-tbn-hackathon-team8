<?php
  if (isset($_GET['kind']) && isset($_GET['Cname']) && isset($_GET['cnt']))
  {
    $kind = $_GET['kind'];
    $Cname = $_GET['Cname'];
    $cnt = $_GET['cnt'];
    $url = "http://api.tbn.org.tw/api/rows?ez=$kind&name=$Cname&cnt=$cnt&type=json";
    $handle = fopen($url,'rb');
    $detail = '';
    while(!feof($handle))
    {
      $detail .= fread($handle,1000000);
    }
    fclose($handle);
    $detail = json_decode($detail,true);
    $i = 0;
    while (isset($detail['rows'][$i]['pics'][0]['pid']))
    {
      $pid = $detail['rows'][$i]['pics'][0]['pid'];
      $image = "http://api.tbn.org.tw/api/picture?pid=$pid&q=25&size=200&type=json";
      $rid = $detail['rows'][$i]['rid'];
      $url = "http://api.tbn.org.tw/api/Survey/SurveyDetail?surveyPID=$rid&type=json";
      $handle = fopen($url,'rb');
      $animal = '';
      while(!feof($handle))
      {
        $animal .= fread($handle,1000000);
      }
      fclose($handle);
      $animal = json_decode($animal,true);
      $title = $animal['Title'];
      $title = explode(".",$title);
      $idurl = "'index.php?id=" . $rid."'";
      $wiki = explode(";",$animal['SpCName']);
      $wiki2 = $wiki[0];
      $wikiurl = "https://zh.wikipedia.org/wiki/" . $wiki2;
      $title2 = urlencode($title[0]);
      $news2 = urlencode($wiki2[0]);
      $mapurl = "http://api.tbn.org.tw/api/wms?ez=$kind&name=$title2&lat=" . $animal['Lat'] . "&lon=" . $animal['Lon'] . "&zoom=12";
      $newsurl = "http://udn.com/search/result/2/$wiki2";
      echo "<input type='hidden' id='mapurl' value=$mapurl />";
      echo "<input type='hidden' id='wikiurl' value=$wikiurl />";
      echo "<input type='hidden' id='newsurl' value=$newsurl />";
      echo "<div style='float:left;border-style:solid;border-width:thin;width:220px' >";
        echo "<div style='text-align:center'>";
          echo "<font style='cursor:pointer;' onclick=search($rid);>".($i+1) . "." . $title[0] . "</font>";
        echo "</div>";
        echo "<div style='margin-left:35px'>";
          echo "<img src=$image width='150px' onclick=search($rid); height='150px' style='cursor:pointer;'>" . "&nbsp;";
        echo "</div>";
      echo "</div>";
      $i++;
    }
  }
  elseif (isset($_GET['id']))
  {
    $rid = $_GET['id'];
    $url = "http://api.tbn.org.tw/api/Survey/SurveyDetail?surveyPID=$rid&type=json";
    $handle = fopen($url,'rb');
    $animal = '';
    while(!feof($handle))
    {
      $animal .= fread($handle,1000000);
    }
    fclose($handle);
    $animal = json_decode($animal,true);
    echo "<p>中文俗稱 : " . $animal['SpCName'] . "</p>";
    echo "<p>英文學名 : " . $animal['SpEName'] . "</p>";
    echo "<p>地點 : " . $animal['Addr'] . "</p>";
    echo "<p>經度 : " . $animal['Lon'] . "</p>";
    echo "<p>緯度 : " . $animal['Lat'] . "</p>";
    $image = $animal['SurveyImagePath'][0]['Path'];
    echo "<p>照片 : </p>";
    echo "<p><img src=$image width='300px' height='300px'></p>" . "&nbsp;";

  }
?>
<script>
  function search(id)
  {
     $.get("pages/detail.php?id=" + id,function(data){
       $("#wiki").attr("src",document.getElementById("wikiurl").value);
       $("#news").attr("src",document.getElementById("newsurl").value);
       $("#map").attr("src",document.getElementById("mapurl").value);
     	 $("#mainContent").html(data);
     });
  }
</script>
