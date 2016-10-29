var master = (function(){
	var _const;

	_const = function(){
		this._header = null;
		this._main = null;
		this._footer = null;
		this._homepage = null;
		this._mainIcon = null;
		//
		this._construct();
	}
	_const.prototype = {
		_construct:function(){
			this._header = $("#header");
			this._main = $("#main");
			this._footer = $("#footer");
			this._homepage = $("#homepage");
			this._mainIcon = $("#mainIcon");

			this._start();
		},
		_start:function(){
			var objThis = this;
		//	objThis._accordin.accordion();
		//	objThis._tabs.tabs();
			this._initialAll();

			//回首頁
			this._homepage.on("click",$.proxy(function(event){
				$.get('pages/main.php',function(data){
					objThis._main.html(data);
				});
			},this))
			/*
			//測試按鈕
			this._test.on("click",$.proxy(function(event){
				objThis._getAlert("測試測試")
			},this))

			this._test1.on("click",$.proxy(function(event){
				objThis._getConfirm("測試測試1")
			},this))*/
		},
		_initialAll:function(){

		},
		//bootbox alert
		_getAlert:function(text){
			bootbox.alert(text);
		},
		//bootbox confirm
		_getConfirm:function(text){
			//bootbox.confirm(text)
			bootbox.confirm(text, function(result) {
				alert(result)
			});
		},

	}


	return _const;
}());
var mySample
$(function(){
	mySample = new master();
})
