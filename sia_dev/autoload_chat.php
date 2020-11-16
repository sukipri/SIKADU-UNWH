<html>
<head>
    <title>Test Refresh Content</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
       $('#load_content').load('chat_me.php#dwn').fadeIn("slow");
    }, 10000); // refresh setiap 10000 milliseconds

    </script>
</head>

<body>
<div id="load_content"> </div>
</body>
</html>