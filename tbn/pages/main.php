<?php
 include("kind.php");
 include("detail.php");
?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">查詢</a></li>
		<li><a href="#tabs-2">地圖</a></li>
		<li><a href="#tabs-3">維基百科</a></li>
	</ul>
	<div id="tabs-1">
		<table  cellpadding="20">
			<tr>
				<th>查詢地點</th>
				<th>查詢種類</th>
				<th>查詢名字(關鍵字ex:蝶)</th>
				<th>查詢英文名字(關鍵字ex:dog)</th>
				<th>數量最大限制</th>

			</tr>
			<tr>
				<td>
					<select id="selectArea" class="form-control">
						<option value="請選擇">請選擇</option>
					</select>
				</td>
				<td>
					<select id="selectSpecies" class="form-control">
						<?php
							foreach ($content as $key => $value)
							{
								echo "<option value='$value->SpeciesName_CN'>$value->SpeciesName_CN($value->SpeciesName_Eng)</option>";
							}
						?>
					</select>
				</td>
				<td>
					<input type='text' id="selectName" class="form-control" />
				</td>
				<td>
					<input type='text' id="selectEngName" class="form-control" />
				</td>
				<td>
					<select id="selectNum" class="form-control">
						<option value="請選擇">請選擇</option>
					</select>
				</td>
				<td colspan="2" >
					<input type='button' id="reset" class='btn btn-info' value="重新輸入" />
					&nbsp;&nbsp;&nbsp;
					<input type='button' id="select" class='btn btn-success' value="查詢" />
				</td>
			</tr>
			<tr>
				<td colspan="7">
					<div id="mainContent">
						<?php
							$i = 0;
							while (isset($detail['rows'][$i]['pics'][0]['pid']))
							{
								$pid = $detail['rows'][$i]['pics'][0]['pid'];
								$image = "http://api.tbn.org.tw/api/picture?pid=$pid&q=25&size=200&type=json";
								echo "<img src=$image width='200px' height='200px'>";
								$i++;
							}
						?>
					</div>
				</td>
			</tr>
		</table>






	</div>
	<div id="tabs-2">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>
	<div id="tabs-3">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>
</div>




<link rel="stylesheet" href="stylesheets/page/main.css">
<script src="javascripts/page/main.js"></script>	<!-- js -->
