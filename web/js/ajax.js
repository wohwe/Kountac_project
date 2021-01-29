function getRequest(){
	var req = null;
	try{
		req = new XMLHttpRequest();
	}catch(e){
		try{
			req = new ActiveXObject("Msxml2.XMLHTTP"); // IE 6.0
		}catch(e){
			try{
				req = new ActiveXObject("Microsoft.XMLHTTP"); // 5.5
			}catch(e){
				alert("Votre navigateur ne surpporte pas AJAX"); // 5.6
			}
		}
	}
	return req;
}

function getData(option){
	option = {
				url:(option.url) ? option.url : null,
				data: (option.data) ? option.data : null,
				method:(option.method) ? option.method : 'GET',
				async:(option.async) ? option.async : true,
				contentType: (option.contentType) ? option.contentType : 'application/x-www-form-urlencoded',
				onSuccess: (option.onSuccess) ? option.onSuccess : null,
				onBegin: (option.onBegin) ? option.onBegin : null,
				onFailure: (option.onFailure) ? option.onFailure : null
			};
	var req = getRequest();
	if(req != null){
		req.onreadystatechange = function(){
			if(option.onBegin != null && 
				(req.readyState >= 0 && req.readyState <= 3)){
				option.onBegin();
			}else if(option.onSuccess != null && 
				req.readyState == 4 && req.status == 200){
				option.onSuccess(req.responseText);
			}else if(option.onFailure != null){
				option.onFailure(req.status);
			}
		}
		req.open(option.method, option.url, option.async);
		req.setRequestHeader("content-type", option.contentType);
		req.send(option.data);
	}
}