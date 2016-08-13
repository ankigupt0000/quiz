var final_target=null;
function stateChanged() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		if (xmlHttp.status == 200) {
			document.getElementById(final_target).innerHTML=xmlHttp.responseText;
		}else if (xmlHttp.status == 404) {
         alert ("Requested URL is not found.");
       } else if (xmlHttp.status == 403) {
         alert("Access denied.");
       } else
         alert("status is " + xmlHttp.status);	
	}
	else if(xmlHttp.readyState==1)
	{
		document.getElementById(final_target).innerHTML="<img height='30' src='/images/processing1.gif'>";
	}
}
function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	  {
	  // Firefox, Opera 8.0+, Safari
	  xmlHttp=new XMLHttpRequest();
	  }
	catch (e)
	  {
	  // Internet Explorer
	  try
	    {
	    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	    }
	  catch (e)
	    {
	    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	  }
	return xmlHttp;
}
function callServer(_action,arr_val,target)
{
	xmlHttp=GetXmlHttpObject();
	if(xmlHttp==null)
	{
		alert("Your Browser don't support AJAX");
		return;
	}
	var final_url=_action+"?"+createParameterList(arr_val);
	final_target=target;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",final_url,true);
	xmlHttp.send(null);
}
function HeaderRequest(_action,arr_val,target) {
     xmlHttp=GetXmlHttpObject();
     if(xmlHttp==null)
	{
		alert("Your Browser don't support AJAX");
		return;
	}
     var url = _action+"?"+createParameterList(arr_val);
     final_target=target;
     xmlHttp.onreadystatechange = stateChanged;
     xmlHttp.open("HEAD", url, true);
     xmlHttp.send(null);
}
function createParameterList(param)
{
	var url="";
	var i=0;
	for(i=0;i<param.length;)
	{
		url+=param[i]+"="+escape(document.getElementById(param[i]).value);		
		i++;
		if(i!=param.length)
		url+="&";
	}
	url=url+"&sid="+Math.random();
	//alert(url);
	return url;
}
function stop_submit()
{
	return false;
}
function multi_response_call(_action,arr_val,arr_target)
{
	xmlHttp=GetXmlHttpObject();
	if(xmlHttp==null)
	{
		alert("Your Browser don't support AJAX");
		return;
	}
	var final_url=_action+"?"+createParameterList(arr_val);
	final_target=arr_target;
	xmlHttp.onreadystatechange=multi_response_state;
	xmlHttp.open("GET",final_url,true);
	xmlHttp.send(null);
	
}
function multi_response_state()
{
 var i;
 if (xmlHttp.readyState == 4) {
     if (xmlHttp.status == 200) {
       var response = xmlHttp.responseText.split("|");
	 for(i=0;i<final_target.length;i++)
	 {
		if(i==0)
		{
		document.getElementById(final_target[i]).innerHTML=response[i];
		//alert(response[i]);
		}
		else
		{
	      document.getElementById(final_target[i]).innerHTML=response[i].replace(/\n/g, "<br />");
		//alert(response[i].replace(/\n/g,"<br />"));
		}
	 }
     } else if (xmlHttp.status == 404) {
         alert ("Requested URL is not found.");
       } else if (xmlHttp.status == 403) {
         alert("Access denied.");
       } else
         alert("status is " + xmlHttp.status);
   }
   else if(xmlHttp.readyState == 1)
	{
		document.getElementById(final_target[0]).innerHTML="<img height='30' src='/images/processing.gif'>";
	}
}
function createXML(param,root)
{
	var xmlString="<"+root+">";
	var i=0;
	for(i=0;i<param.length;i++)
	{
		xmlString+="<"+param[i]+">"+document.getElementById(param[i]).value+"</"+param[i]+">";
	}
	xmlString+="</"+root+">";
	//alert(xmlString);
	return xmlString;
}
function xml_callServer(_action,arr_val,target,root)
{
	xmlHttp=GetXmlHttpObject();
	if(xmlHttp==null)
	{
		alert("Your Browser don't support AJAX");
		return;
	}
	var final_XML=createXML(arr_val,root);
	final_target=target;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("POST",_action,true);
	xmlHttp.setRequestHeader("Content-Type", "text/xml");
	xmlHttp.send(final_XML);
}
function call_Server_XML(_action,arr_val,target,root)
{
	xmlHttp=GetXmlHttpObject();
	if(xmlHttp==null)
	{
		alert("Your Browser don't support AJAX");
		return;
	}
	var final_XML=createXML(arr_val,root);
	final_target=target;
	xmlHttp.onreadystatechange=response_XML;
	xmlHttp.open("POST",_action,true);
	xmlHttp.setRequestHeader("Content-Type", "text/xml");
	xmlHttp.send(final_XML);
}
function callServer_Post(_action,arr_val,target)
{
	xmlHttp=GetXmlHttpObject();
	if(xmlHttp==null)
	{
		alert("Your Browser don't support AJAX");
		return;
	}
	var final_param=createParameterList(arr_val);
	final_target=target;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("POST",_action,true);
	xmlHttp.send(final_param);
}

function response_XML() {
  if (xmlHttp.readyState == 4) {
    if (xmlHttp.status == 200) {
      var xmlDoc = xmlHttp.responseXML;
      var showElements = xmlDoc.getElementsByTagName("aid");
      for (var x=0; x<showElements.length; x++) {
        // We know that the first child of show is title, and the second is rating
        var title = showElements[x].childNodes[0].value;
        var rating = showElements[x].childNodes[1].value;
	  //alert(title);
      }
    }
	else if (xmlHttp.status == 404) {
         alert ("Requested URL is not found.");
       } else if (xmlHttp.status == 403) {
         alert("Access denied.");
       } else
         alert("status is " + xmlHttp.status);
  }
}
