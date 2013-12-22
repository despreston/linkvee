var xmlhttp;

function addUserInstantly()
{
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
url = "getusers.php";
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
{
document.getElementByClass("addresses").innerHTML=xmlhttp.responseText;
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}

///////////////////////
//get more info 
///////////////////////
function getmoreinfo(str)
{
var xmlhttp2;
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp2=new XMLHttpRequest();
  }
else
  {
  // code for IE6, IE5
  xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp2.onreadystatechange=function()
{
if(xmlhttp2.readyState==4)
  {
  var HTMLcontent = xmlhttp2.responseText;
  document.getElementById("contact_info").innerHTML = HTMLcontent;
  return;
  }
}
url2 = "getmoreinfo.php";
url2=url2+"?q="+str;
url2=url2+"&sid="+Math.random();
xmlhttp2.open("GET",url2,true);
xmlhttp2.send(null);
}

///////////////////////
//delete contact
///////////////////////
function delete_contact(str)
{
var xmlhttp3;
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp3=new XMLHttpRequest();
  }
else
  {
  // code for IE6, IE5
  xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp3.onreadystatechange=function()
{
if(xmlhttp3.readyState==4)
  {
  var HTMLcontent = xmlhttp3.responseText;
  document.getElementById("admin_contacts").innerHTML = HTMLcontent;
  return;
  }
}
url3 = "delete_contact.php";
url3=url3+"?q="+str;
url3=url3+"&sid="+Math.random();
xmlhttp3.open("GET",url3,true);
xmlhttp3.send(null);
}

//////////////////////////////
//Search function
//////////////////////////////
function searchFunction(str)
{
var xmlhttp4;
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp4=new XMLHttpRequest();
  }
else
  {
  // code for IE6, IE5
  xmlhttp4=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp4.onreadystatechange=function()
{
if(xmlhttp4.readyState==4)
  {
  var HTMLcontent = xmlhttp4.responseText;
  document.getElementById("search_result").innerHTML = HTMLcontent;
  return;
  }
}
url4 = "getsearch.php";
url4=url4+"?q="+str;
url4=url4+"&sid="+Math.random();
xmlhttp4.open("GET",url4,true);
xmlhttp4.send(null);
}
///////////////////////////////
//add new contact pop up window
///////////////////////////////
var ie = document.all;
var nn6 = document.getElementById &&! document.all;

var x, y;
var dobj;

function styledPopupClose() {
  document.getElementById("styled_popup").style.display = "none";
}
			
//end code for add new contact pop up window										