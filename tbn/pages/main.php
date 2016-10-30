<?php
	include("kind.php");
	include("detail.php");
	if (isset($_GET['id']))
	{
		$rid = $_GET['id'];
	}
?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">查詢</a></li>
		<li><a href="#tabs-2">地圖</a></li>
		<li><a href="#tabs-3">維基百科</a></li>
		<li><a href="#tabs-4">近期新聞</a></li>
		<li><a href="#tabs-5">親子活動</a></li>
		<font id="currentCondition">查詢-></font>

	</ul>
	<div id="tabs-1" align="center">
		<label disabled='disabled' id="back"><img src="img/return.png">&nbsp;回上一頁</label>

		<table cellpadding="20" width="100%">
			<tr>
				<th>#</th>
				<th>查詢種類</th>
				<th>查詢名字(關鍵字ex:蝶)</th>
				<th>數量最大限制</th>

			</tr>
			<tr>
				<td>

				</td>
				<td>
					<select id="selectSpecies" class="form-control">
						<option value="請選擇">請選擇</option>
						<?php
							foreach ($content as $key => $value)
							{
								echo "<option value='$value->SpeciesName_CN'>$value->SpeciesName_CN($value->SpeciesName_Eng)</option>";
							}
						?>
					</select>
				</td>
				<td>
					<input id="selectName" list="name" class="form-control" />
					<datalist id="name">
						<option value="q" />
					</datalist>
				</td>
				<td>
					<select id="selectNum" class="form-control">
						<option value="請選擇">請選擇</option>
					</select>
				</td>
				<td colspan="2" >
					<input type='button' id="select" class='btn btn-success' value="查詢" />
					&nbsp;&nbsp;&nbsp;
					<input type='button' id="reset" class='btn btn-info' value="重新輸入" />
				</td>
			</tr>
			<tr>
				<td colspan="9">
					<div id="mainContent">
					</div>
				</td>
			</tr>
		</table>






	</div>

	<div id="tabs-2">
      <div id="mapContent">
        <iframe id="map" width="655px" height="655px" frameborder="1" src=""></iframe>
      </div>
	</div>

	<div id="tabs-3">
      <div id="wikiContent">
          <iframe id="wiki" width="100%" height="750px" frameborder="1" src=""></iframe>
      </div>
	</div>

	<div id="tabs-4">
			<div id="newsContent">
					<iframe id="news" width="100%" height="750px" frameborder="1" src=""></iframe>
			</div>
	</div>
	
	<div id="tabs-5">
			<div id="childContent">
					<iframe id="child" width="100%" height="750px" frameborder="1" src=""></iframe>
			</div>
	</div>
</div>

<input type="hidden" id="tmpPara" value="" />
<link rel="stylesheet" href="stylesheets/page/circle.css">
<link rel="stylesheet" href="stylesheets/context/colorbox.css">
<script src="javascripts/context/jquery.colorbox.js"></script>
<link rel="stylesheet" href="stylesheets/page/main.css">
<script src="javascripts/page/main.js"></script>	<!-- js -->
