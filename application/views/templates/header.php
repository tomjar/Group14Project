
<!DOCTYPE html>

<head>
<style type="text/css">
.wrapper {
    text-align: center;
}

.button {
    position: absolute:
    top: 50%;
}
</style>
<script>
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_info.txt",true);
xmlhttp.send();
}	
</script>
	<title><?php echo $title ?> - University Clubs</title>
</head>
<body bgcolor="SNOW">
	<h1>University Event Viewer</h1>
    <hr color="black" SIZE="4" NOSHADE>
	
