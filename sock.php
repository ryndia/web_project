<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
		$fp = fsockopen("youtube.com", 80);
		if($fp)
		{
			fwrite($fp,"GET /HTTP/1.1\r\nHOST: youtube.com\r\n\r\n");
			while(!feof($fp))
			{
				print fread($fp,256);
			}
			fclose($fp);
		}
		else
		{
			echo "error\n";
		}
	 ?>
</body>
</html>
