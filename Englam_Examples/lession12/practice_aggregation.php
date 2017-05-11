<html>
<?php
include ("LIB_http.php");
include ("LIB_parse.php");
include ("LIB_rss.php");
?>


<head>
	<style>BODY {font-family:arial; color: black;}</style>
</head>
<table>

 
	<tr>
		<td>Test 1:</td>
		<td valign="top" width="33%">
			<?
				$target = "http://www.ft.com/rss/home/uk";
				$rss_array = download_parse_rss($target);
				display_rss_array($rss_array)
			?>
		
		</td>
		<td>Test 2:</td>
		<td valign="top" width="33%">
			<?
				$target = "http://www.startribune.com/rss/?sf=1&s=/";
				$rss_array = download_parse_rss($target);
				display_rss_array($rss_array)
			?>
		
		</td>
		<td>Test 3:</td>
		<td valign="top" width="33%">
			<?
				$target = "https://lasvegassun.com/feeds/headlines/all/";
				$rss_array = download_parse_rss($target);
				display_rss_array($rss_array)
			?>
		
		</td>

	</tr>

</table>
</html>