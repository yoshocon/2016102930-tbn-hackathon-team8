var main = (function(){
	var _const;
	
	_const = function(){
		this._accordion = null;
		this._tabs = null;
		this._test = null;
		this._test1 = null;
		
		
		this._construct();
	}
	_const.prototype = {
		_construct:function(){
			this._accordin = $("#accordion");
			this._tabs = $("#tabs");
			this._test = $("#test");
			this._test1 = $("#test1");
			
			this._start();
		},
		_start:function(){
			var objThis = this;
			objThis._accordin.accordion();
			objThis._tabs.tabs();
			this._initialAll();
			
			//測試按鈕
			this._test.on("click",$.proxy(function(event){
				objThis._getAlert("測試測試")
			},this))
			
			this._test1.on("click",$.proxy(function(event){
				objThis._getConfirm("測試測試1")
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
	mySample = new main();
})