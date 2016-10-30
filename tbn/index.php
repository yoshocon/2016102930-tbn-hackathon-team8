<!doctype html>
<html lang="us">
	<head>

		<link rel="stylesheet" href="stylesheets/context/ul.css">

		<link rel="stylesheet" href="stylesheets/context/jquery-ui.css">		<!-- jquery ui css 			通用-->
		<link rel="stylesheet" href="stylesheets/context/bootstrap.css">		<!-- bootstrap.min css    通用-->

		<script src="javascripts/context/jquery.js"></script>			<!-- jquery語法     		通用  -->
		<script src="javascripts/context/jquery-ui.js"></script>		<!-- jquery ui js 			通用  -->
		<script src="javascripts/context/bootstrap.min.js"></script>		<!-- bootstrap.min 			通用  -->
		<script src="javascripts/context/bootbox.min.js"></script>		<!-- bootbox彈跳   		通用  -->

		<meta charset='utf-8' />
	</head>
	<body >
		<div id="header" >

			<img id="homepage" class="img-thumbnail" src="img/title.png" />

			<ul id="ul" class="drop-down-menu" >
				<li><a href="#"><img style='margin-right:10px;' src='img/cat.png'>關於我們</a>
					<ul>
						<li><a href="#"><img style='margin-right:10px;' src='img/bear.png'>服務據點</a>
						</li>
						<li><a href="#"><img style='margin-right:10px;' src='img/bee.png'>服務客戶</a>
						</li>
						<li><a href="#"><img style='margin-right:10px;' src='img/bulldog.png'>服務地區</a>
						</li>
						<li><a href="#"><img style='margin-right:10px;' src='img/cow.png'>徵才資訊</a>
						</li>
					</ul>
				</li>
				<li><a href="#"><img style='margin-right:10px;' src='img/deer.png'>Magento</a>
				</li>
				<li><a href="#"><img style='margin-right:10px;' src='img/dog.png'>服務項目</a>

					<ul>
						<li><a href="#"><img style='margin-right:10px;' src='img/elephant.png'>系統整合</a>
							<ul>
								<li><a href="#"><img style='margin-right:10px;' src='img/fly.png'>Magento與POS訂單系統整合</a>
								</li>
								<li><a href="#"><img style='margin-right:10px;' src='img/fox.png'>Magento與CRM客戶管理系統整合</a>
								</li>
								<li><a href="#"><img style='margin-right:10px;' src='img/lion.png'>Magento與ERP管理系統整合</a>
								</li>
								<li><a href="#"><img style='margin-right:10px;' src='img/panda-bear.png'>Magento金流串接服務</a>
								</li>
							</ul>

						</li>
						<li><a href="#"><img style='margin-right:10px;' src='img/pig.png'>專業網頁設計</a>
							<ul>
								<li><a href="#"><img style='margin-right:10px;' src='img/piranha.png'>響應式網頁設計 (Responsive Web Design)</a>
								</li>
								<li><a href="#"><img style='margin-right:10px;' src='img/rabbit.png'>手機網站設計</a>
								</li>
								<li><a href="#"><img style='margin-right:10px;' src='img/wolf.png'>WordPress 網頁設計</a>
								</li>
							</ul>
						</li>
						<li><a href="#"><img style='margin-right:10px;' src='img/squirrel.png'>網路行銷服務</a>
							<ul>
								<li><a href="#"><img style='margin-right:10px;' src='img/hedgehog.png'>Amazon亞馬遜網路商城</a>
								</li>
								<li><a href="#"><img style='margin-right:10px;' src='img/whale.png'>社群媒體行銷</a>
								</li>
								<li><a href="#"><img style='margin-right:10px;' src='img/chick.png'>SEO 搜尋引擎優化</a>
									<ul>
										<li><a href="#"><img style='margin-right:10px;' src='img/llama.png'>在地SEO</a>
										</li>
										<li><a href="#"><img style='margin-right:10px;' src='img/mouse.png'>SEO 搜尋引擎優化</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#"><img style='margin-right:10px;' src='img/hippopotamus.png'>網站客製開發</a>
						</li>
					</ul>
				</li>
				<li><a href="#"><img style='margin-right:10px;' src='img/bulldog.png'>專案介紹</a>
				</li>
				<li><a href="#"><img style='margin-right:10px;' src='img/lemur.png'>資訊分享</a>
				</li>
				<li><a href="#"><img style='margin-right:10px;' src='img/bull.png'>聯絡我們</a>
				</li>
			</ul>

			<img id="mainIcon" class="img-rounded" src="img/bear1.png"  />
		</div>

		<div id="main" >
			這裡是main
		</div>

		<div id="footer" style="border:1px solid black;">
			瀏覽次數：
	   <?php
	    $hit = file_get_contents("logintime.txt");
	    file_put_contents("logintime.txt", ((int)$hit) + 1 );
	    echo file_get_contents("logintime.txt");
	   ?>
		</div>



		<link rel="stylesheet" href="stylesheets/page/index.css">		<!--  css -->
		<script src="javascripts/page/index.js"></script>
	</body>

</html>
