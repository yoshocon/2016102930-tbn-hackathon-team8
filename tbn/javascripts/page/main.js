var main = (function(){
	var _const;
	
	_const = function(){
		this._tabs = null;
		this._test = null;
		this._test1 = null;
		this._selectNum = null;
		
		this._construct();
	}
	_const.prototype = {
		_construct:function(){
			this._tabs = $("#tabs");
			this._test = $("#test");
			this._test1 = $("#test1");
			this._selectNum = $("#selectNum");
			
			this._start();
		},
		_start:function(){
			var objThis = this;
			objThis._tabs.tabs();
			objThis._getNum();
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