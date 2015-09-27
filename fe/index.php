
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head> 
  <title>Open OTA project</title> 
   <style type='text/css'>
    pre {outline: 1px solid #ccc; padding: 5px; margin: 5px; }
	.string { color: green; }
	.number { color: darkorange; }
	.boolean { color: blue; }
	.null { color: magenta; }
	.key { color: red; }
  </style>

<script type='text/javascript'>//<![CDATA[
	window.onload=function(){
	function output(inp) {
	    document.body.appendChild(document.createElement('pre')).innerHTML = inp;
	}

	function syntaxHighlight(json) {
	    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
	    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
	        var cls = 'number';
	        if (/^"/.test(match)) {
	            if (/:$/.test(match)) {
	                cls = 'key';
	            } else {
	                cls = 'string';
	            }
	        } else if (/true|false/.test(match)) {
	            cls = 'boolean';
	        } else if (/null/.test(match)) {
	            cls = 'null';
	        }
	        return '<span class="' + cls + '">' + match + '</span>';
	    });
	}
	var obj = <?php echo file_get_contents("../data/appz_generated.json") ?>;
	var str = JSON.stringify(obj, undefined, 4);
	output(syntaxHighlight(str));
}//]]> 

</script>
</head> 
<body>
<?php
	echo "<h1>List of Appz</h1>";
?>
</body> 
</html>
