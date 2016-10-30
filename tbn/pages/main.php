
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">查詢</a></li>
		<li><a href="#tabs-2">地圖</a></li>
		<li><a href="#tabs-3">維基百科</a></li>
		<font id="currentCondition">查詢->蝴蝶類->灰蝶:豆波灰蝶</font>
		
	</ul>
	<div id="tabs-1" align="center">
		<label disabled='true' id="back"><img src="img/return.png">&nbsp;回上一頁</label>
		
		<table cellpadding="20">
			<tr>
				<th>查詢地點</th>	
				<th>查詢種類</th>	
				<th>查詢名字(關鍵字ex:蝶)</th>	
				<th>數量最大限制</th>	
				
			</tr>
			<tr>
				<td>
					<select id="selectArea" class="form-control">
						<option value="請選擇">請選擇</option>
						<option value="1">1</option>
					</select>
				</td>
				<td>
					<select id="selectSpecies" class="form-control">
						<option value="請選擇">請選擇</option>
						<option value="1">1</option>
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
						<option value="1">1</option>
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
		
	</div>
	<div id="tabs-3">
		<p><a class='iframe' href="https://zh.wikipedia.org/wiki/台灣獼猴">Outside Webpage (Iframe)</a></p>
	</div>
</div>
<input type="hidden" id="tmpPara" value="" />
	<link rel="stylesheet" href="stylesheets/context/colorbox.css">
	<script src="javascripts/context/jquery.colorbox.js"></script>
	<link rel="stylesheet" href="stylesheets/page/main.css">
	<script src="javascripts/page/main.js"></script>	<!-- js -->
		