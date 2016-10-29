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
			this._initialAll();
			
			$.get('pages/main.php',function(data){
					objThis._main.html(data);
				});
			//回首頁
			this._homepage.on("click",$.proxy(function(event){
				$.get('pages/main.php',function(data){
					objThis._main.html(data);
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