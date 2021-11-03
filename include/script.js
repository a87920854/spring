function GotoPage(tPage,theForm){
	theForm.tPage.value=tPage;
	theForm.submit();
}

function Mars_popup(theURL,winName,features) { //【火星人】Version 1.0
	if(winName == '') winName = '_blank';
	window.open(theURL,winName,features);
}

function Mars_popup2(theURL,winName,features) { //【火星人】Version 1.0
	if(winName == '') winName = '_blank';
	if (window.confirm("確定刪除")==true) {
		window.open(theURL,winName,features);
	}else{
		alert("重新選擇");
	}
}