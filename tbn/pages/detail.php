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
      echo "<div style='float:left;border-style:solid;border-width:thin;width:220px' onclick=test($rid);>";
        echo "<div style='text-align:center'>";
          echo $i+1 . "." . $title[0];
        echo "</div>";
        echo "<div style='margin-left:35px'>";
          echo "<img src=$image width='150px' height='150px'>" . "&nbsp;";
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
    echo "中文俗稱 : " . $animal['SpCName'];
    echo "英文學名 : " . $animal['SpEName'];
    echo "地點 : " . $animal['Addr'];
    echo "經度 : " . $animal['Lon'];
    echo "緯度 : " . $animal['Lat'];
    $image = $animal['SurveyImagePath']['Path'];
    echo "<div>";
      echo "<div>";
        echo "照片 : ";
      echo "</div>";
      echo "<div>";
        echo "<img src=$image width='300px' height='300px'>" . "&nbsp;";
      echo "</div>";
    echo "</div>";
  }
?>
<script>
  function test(id)
  {
    alert("2");
     $.get("pages/detail.php?id=" + id,function(data){
     	//$("mainContent").html(data);
      alert("5")
     });
  }
</script>
