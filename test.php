<?php
include "phpminimize.php";
ob_start("phpMinimize");
?><!DOCTYPE html>
<html>
<head>
	<title>This is a test</title>
</head>


<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Open+Sans:700,400:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + 
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

  </script>

<style type="text/css">
	/* This is a multiline comment in CSS*/
	body{
		background-color: #CCCCCC;
		color: 000000;
		font-family: 'Open Sans', sans-serif;
	}
	pre{
		border: 1px dashed #F3F3F3;
	}
</style>

<body>
	<h1>Test Page:</h1>
	<p>This is an example of what <a href="https://github.com/cecilomar/phpMinimize" title="phpMinimize">phpMinimize()</a> can do.</p>


<pre>
This part is inside a &lt;pre&gt;
and will stay unchanged.

You could also use &lt;code&gt; too.
</pre>


</body>
</html>