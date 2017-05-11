<?php

// Define the source FTP server, file location and authentication values
define("REMOTE_FTP_SERVER", "192.168.13.7");  // domain name or IP address
define("REMOTE_USERNAME", "englam");
define("REMOTE_PASSWORD", "englam");
define("REMOTE_DIRCTORY", "daily_sales");
define("REMOTE_FILE", "sales.txt");

// Define the corporate FTP server, file location and authentication values
define("CORP_FTP_SERVER", "corp_FTP_address");
define("CORP_USERNAME", "yourUserName");
define("CORP_PASSWORD", "yourPassword");
define("CORP_DIRECTORY", "sales_reports");
define("CORP_FILE", "store_03_".date("Y-M-d"));

// Negotiate a socket connection to the remote FTP server
$remote_connection_id = ftp_connect(REMOTE_FTP_SERVER);

// Log in (authenticate) the source server
if(!ftp_login($remote_connection_id, REMOTE_USERNAME, REMOTE_PASSWORD))
	report_error_and_quit("Remote ftp_login failed", $remote_connection_id);

