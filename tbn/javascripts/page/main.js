var main = (function(){
	var _const;

	_const = function(){
		this._tabs = null;
		this._reset = null;
		this._select = null;

		this._selectSpecies = null;
		this._selectName = null;
		this._selectNum = null;
		this._iframe = null;
		this._mainContent = null;
		this._back = null;
		this._tmpPara = null;
		this._currentCondition = null;

		this._construct();


	}
	_const.prototype = {
		_construct:function(){
			this._tabs = $("#tabs");
			this._reset = $("#reset");
			this._select = $("#select");

			this._selectSpecies = $("#selectSpecies");
			this._selectName = $("#selectName");
			this._selectNum = $("#selectNum");
			this._iframe = $(".iframe");
			this._mainContent = $("#mainContent");
			this._back = $("#back");
			this._tmpPara = $("#tmpPara");
			this._currentCondition = $("#currentCondition");

			this._start();
		},
		_start:function(){
			var objThis = this;
			objThis._tabs.tabs();
			objThis._getNum();
			this._initialAll();
			// objThis._child.attr("src","json2.php")
			//重新輸入按鈕
			this._reset.on("click",$.proxy(function(event){
				document.getElementById("selectSpecies").value = "請選擇";
				document.getElementById("selectName").value = "";
				document.getElementById("selectNum").value = "請選擇";
				objThis._selectSpecies.attr("class","form-control");
				objThis._selectName.attr("class","form-control");
				objThis._selectNum.attr("class","form-control");
				objThis._mainContent.html();
				objThis._currentCondition.empty()
				objThis._currentCondition.append("查詢->")
			},this));
			//查詢按鈕
			this._select.on("click",$.proxy(function(event){
				$(event.currentTarget).button("loading");


				if(objThis._selectSpecies.val() == "請選擇")
				{
					objThis._selectSpecies.addClass("error-control");
				}else
				{
					objThis._selectSpecies.attr("class","form-control");
				}

				if(objThis._selectName.val() == "")
				{
					objThis._selectName.addClass("error-control");
				}else
				{
					objThis._selectName.attr("class","form-control");
				}

				if(objThis._selectNum.val() == "請選擇")
				{
					objThis._selectNum.addClass("error-control");
				}else
				{
					objThis._selectNum.attr("class","form-control");
				}

				if(objThis._selectSpecies.val() == "請選擇" || objThis._selectName.val() == "" ||  objThis._selectNum.val() == "請選擇")
				{
					objThis._getAlert("請選取查詢資料");
					$(event.currentTarget).button("reset");
				}else
				{
					objThis._mainContent.empty();
					objThis._mainContent.append("<div align='center'><div class='loading' align='center'></div><br/><font style='font-weight:bold;font-size:18px; '>查詢中...請稍等</font></div>");
					$.get("pages/detail.php?kind=" + objThis._selectSpecies.val() + "&Cname=" + objThis._selectName.val() + "&cnt=" + objThis._selectNum.val(),function(data){

						$(event.currentTarget).button("reset");
						document.getElementById("tmpPara").value = "kind=" + objThis._selectSpecies.val() + "&Cname=" + objThis._selectName.val() + "&cnt=" +objThis._selectNum.val();
						objThis._back.removeAttr("disabled");
						objThis._mainContent.html(data);
						objThis._currentCondition.empty()
						objThis._currentCondition.append("查詢->" + objThis._selectSpecies.val() + "->" + objThis._selectName.val() + ":");
					});
				}

			},this));
			//維基
			objThis._iframe.colorbox({iframe:true, width:"80%", height:"80%"});
			//回上一頁
			this._back.on("click",$.proxy(function(event){

				if(objThis._back.attr("disabled")!="disabled")
				{
					objThis._mainContent.empty();
					objThis._mainContent.append("<div align='center'><div class='loading' align='center'></div></div><br/><font style='font-weight:bold;font-size:18px;'>查詢中...請稍等</font>");
					$.get("pages/detail.php?" + document.getElementById("tmpPara").value,function(data){
						objThis._mainContent.html(data);
					});
				}

			},this))

		},
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
