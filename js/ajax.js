//AJAX 送出查詢字串到指定檔案 以 option組合*****
function AjaxLoadClass2(PKey){
	removeOptions('Class2');
	if (document.getElementById('Class3'))
		removeOptions('Class3');
	if (document.getElementById('Product_PKey'))
		removeOptions('Product_PKey');	
	AjaxLoadSuccess("Class2",PKey)
}


//AJAX 送出查詢字串到指定檔案 以 option組合*****
function AjaxLoadClass3(PKey){
	removeOptions('Class3');
	AjaxLoadSuccess("Class3",PKey);
	if (document.getElementById('Product_PKey')){
		removeOptions('Product_PKey');
		AjaxLoadSuccess("Product_PKey",PKey)
	}
}

$(function(){
	//產生祕書名單
	$("#branch").change(function(){
		var branch = $("#branch").val();
		removeOptions('single');
		AjaxLoadSuccess("single",branch,"get_personnel");
	});	
		
	//產生官網小類選單
	$("#Class2").change(function(){
		var PKey = $("#Class2").val();
		if ($("#Class3").length > 0 ) {
		removeOptions('Class3');
		AjaxLoadSuccess("Class3",PKey);
		}
	});
		
	//產生官網小類選單
	$("#PClass1").change(function(){
		var PKey = $("#PClass1").val();
		removeOptions('PClass2');
		if ($("#PClass3").length > 0 ) { 
		removeOptions('PClass3');}
		AjaxLoadSuccess("PClass2",PKey);
	});	
		
	//產生Walker小類選單
	$("#Walker_Class1").change(function(){
		var PKey = $("#Walker_Class1").val();
		if ($("#Walker_Class2").length > 0 ) {
		removeOptions('Walker_Class2');
		AjaxLoadSuccess("Walker_Class2",PKey);
		}
	});	
		
	//產生旅遊美食店家小類選單
	$("#Store_Class1").change(function(){
		var PKey = $("#Store_Class1").val();
		if ($("#Store_Class2").length > 0 ) {
		removeOptions('Store_Class2');
		AjaxLoadSuccess("Store_Class2",PKey);
		}
	});	
		
	//產生旅遊美食商圈小類選單
	$("#Local_Class1").change(function(){
		var PKey = $("#Local_Class1").val();
		if ($("#Local_Class2").length > 0 ) {
		removeOptions('Local_Class2');
		AjaxLoadSuccess("Local_Class2",PKey);
		}
	});		
});	
	
function AjaxLoadSuccess(selectbox,branch,rtype,flag,invite){
	console.log("../ajax/ajax.php?branch="+ branch + "&re_type=" + rtype);
	$(function(){
		$.ajax({
		   type: "POST",
		   url: "ajax/ajax.php",
		   data: "branch=" + branch + "&re_type=" + rtype ,
		   success: function(json){
			    onComplete(selectbox,json);
			  }
		});
	});	
}

//完成後執行的函數
function onComplete(selectbox,val)
{
	var str = val;
	if (typeof(val) !== 'undefined' && val !== ''){
			str = eval("(" + str + ")");	
			for(var i = 0; i < str.data.length; i++){
				document.getElementById(selectbox).options[i + 1] = new Option(str.data[i].Name,str.data[i].ID);
				document.getElementById(selectbox).options[value=Name].prop('selected', true);
			};
		}
	
	
}

//移除指定的options
function removeOptions(selectbox)
{
	var i;
	for(i=document.getElementById(selectbox).options.length-1;i>0;i--)
	{
		//selectbox.options.remove(i);
		document.getElementById(selectbox).remove(i);
	}
}