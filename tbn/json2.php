<?php
    header("Content-Type: text/html; charset=utf-8");

	$url="http://cloud.culture.tw/frontsite/trans/SearchShowAction.do?method=doFindTypeJ&category=4";
    //侵子文化部api 網址data.gov.tw/node/604

	$json = file_get_contents($url);
    $json_data =json_decode($json);
    //抓取親子文化部資料

    echo '你選擇的活動是:'.$json_data[0]->title.'<br/>';
    echo '地址為'.$json_data[0]->showInfo[0]->location.'<br/>';
    echo '時間是'.$json_data[0]->showInfo[0]->time.'<br/>';
    //列出活動地址時間

    //echo '你預定的活動座標是'.'<br/>';
    //  echo $json_data[0]->showInfo[0]->latitude.'<br/>';
    //  echo $json_data[0]->showInfo[0]->longitude;

    $lat=$json_data[0]->showInfo[0]->latitude;
    $lon=$json_data[0]->showInfo[0]->longitude;
    //取出該活動座標
    echo '你此次活動附近所有的鳥類'."<br/>";
    $ez=urlencode("鳥類");
    //給使用者輸入想要看或認識的動物
    $near="http://api.tbn.org.tw/api/Near?ez=$ez&lat=$lat&lon=$lon&type=json";
    $handle = fopen($near,'rb');
    $nearjson ='';
    while(!feof($handle))
    {
        $nearjson .= fread($handle,100000);
    }
    fclose($handle);
    $nearjson = json_decode($nearjson,false);
    // $nearjson_data=json_decode($nearjson);
    //串入活動座標並抓取tbnapi

    echo $nearjson_data->rows[0]->ez_name;
    echo $nearjson_data->rows[0]->genus_infra;
    echo $nearjson_data->rows[0]->fam.'<br/>';
    //顯示動物名字

    $pid=$nearjson_data->rows[0]->pics[0]->pid;
    $pictrue="http://api.tbn.org.tw/api/picture?pid=$pid&q=100&size=600&type=json";
    //接入圖片api
    echo "<img src=$pictrue>";
