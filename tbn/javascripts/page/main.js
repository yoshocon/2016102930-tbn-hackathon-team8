var main = (function(){
	var _const;

	_const = function(){
		this._tabs = null;
		this._reset = null;
		this._select = null;

		this._selectArea = null;
		this._selectSpecies = null;
		this._selectName = null;
		this._selectEngName = null;
		this._selectNum = null;

		this._mainContent = null;

		this._construct();
	}
	_const.prototype = {
		_construct:function(){
			this._tabs = $("#tabs");
			this._reset = $("#reset");
			this._select = $("#select");

			this._selectArea = $("#selectArea");
			this._selectSpecies = $("#selectSpecies");
			this._selectName = $("#selectName");
			this._selectEngName = $("#selectEngName");
			this._selectNum = $("#selectNum");

			this._mainContent = $("#mainContent");

			this._start();
		},
		_start:function(){
			var objThis = this;
			objThis._tabs.tabs();
			objThis._getNum();
			this._initialAll();


			//重新輸入按鈕
			this._reset.on("click",$.proxy(function(event){
				document.getElementById("selectArea").value = "請選擇";
				document.getElementById("selectSpecies").value = "請選擇";
				document.getElementById("selectName").value = "";
				document.getElementById("selectEngName").value = "";
				document.getElementById("selectNum").value = "請選擇";

			},this));
			//查詢按鈕
			// objThis._selectArea.val() == "請選擇" || || objThis._selectEngName.val() == ""  //暫時用不到先放這
			this._select.on("click",$.proxy(function(event){
				if(objThis._selectSpecies.val() == "請選擇" || objThis._selectName.val() == "" || objThis._selectNum.val() == "請選擇")
				{
					objThis._getAlert("請選取查詢資料");
				}else
				{
					// $.ajax({
					// 	type :'GET',
					// 	url :'detail.php?id=$rid',
					// 	success : function(){
					// 			// $.get("pages/detail.php?id=" + objThis._getPara('id'),function(data){
					// 			// 	objThis._mainContent.html(data);
					// 	},
					// 	beforeSend : function()
					// 	{
					// 		objThis._loading();
					// 	}
					// })
					$.get("pages/detail.php?kind=" + objThis._selectSpecies.val() + "&Cname=" + objThis._selectName.val() + "&cnt=" + objThis._selectNum.val(),function(data){
						objThis._mainContent.html(data);
					});
				}

			},this));


		},
		_loading:function(){},
		//取得GET參數
        _getPara:function(para)
        {
            var strUrl = location.search;
            var getPara, ParaVal;
            var aryPara = [];

            if (strUrl.indexOf("?") != -1) {
                var getSearch = strUrl.split("?");
                getPara = getSearch[1].split("&");
                for (i = 0; i < getPara.length; i++) {
                    ParaVal = getPara[i].split("=");
                    aryPara.push(ParaVal[0]);
                    aryPara[ParaVal[0]] = ParaVal[1];
                }
            }
            return aryPara[para];
        },
		_initialAll:function(){

		},
		//bootbox alert
		_getAlert:function(text){
			bootbox.alert(text);
		},
		//bootbox confirm
		_getConfirm:function(text){
			bootbox.confirm(text, function(result) {
				alert(result)
			});
		},
		_getNum:function(){
			var objThis = this;
			for(i=50;i<=500;i+=50)
			{
				objThis._selectNum.append("<option value=" + i + ">" + i + "</option>");
			}
		}

	}


	return _const;
}());
var mySample
$(function(){
	mySample = new main();
})
