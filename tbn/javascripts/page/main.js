var main = (function(){
	var _const;
	
	_const = function(){
		this._tabs = null;
		this._reset = null;
		this._select = null;
		
		this._selectArea = null;
		this._selectSpecies = null;
		this._selectName = null;
		this._selectNum = null;
		this._iframe = null;
		this._mainContent = null;
		this._back = null;
		this._tmpPara = null;
		
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
			this._selectNum = $("#selectNum");
			this._iframe = $(".iframe");
			this._mainContent = $("#mainContent");
			this._back = $("#back");
			this._tmpPara = $("#tmpPara");
			
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
				document.getElementById("selectNum").value = "請選擇";
				objThis._selectArea.attr("class","form-control");
				objThis._selectSpecies.attr("class","form-control");
				objThis._selectName.attr("class","form-control");
				objThis._selectNum.attr("class","form-control");
			},this));
			//查詢按鈕
			this._select.on("click",$.proxy(function(event){
				if(objThis._selectArea.val() == "請選擇")
				{
					objThis._selectArea.addClass("error-control");
				}else
				{
					objThis._selectArea.attr("class","form-control");
				}
				
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
				
				if(objThis._selectArea.val() == "請選擇" || objThis._selectSpecies.val() == "請選擇" || objThis._selectName.val() == "" ||  objThis._selectNum.val() == "請選擇")
				{
					objThis._getAlert("請選取查詢資料");
				}else
				{
					$.get("pages/detail.php?kind=" + objThis._selectSpecies.val() + "&Cname=" + objThis._selectName.val(),function(data){
						document.getElementById("tmpPara").value = "kind=" + objThis._selectSpecies.val() + "&Cname=" + objThis._selectName.val() + "&cnt=" +objThis._selectNum.val();
						
						objThis._mainContent.html(data);
					});		
				}			
				
			},this));
			//維基
			objThis._iframe.colorbox({iframe:true, width:"80%", height:"80%"});
			//回上一頁
			this._back.on("click",$.proxy(function(event){
				$.get("pages/detail.php?" + document.getElementById("tmpPara").value,function(data){
					objThis._mainContent.html(data);
				});
			},this))
			
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