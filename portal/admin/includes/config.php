<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "kM>21o@h*!2";
$mysql_database = "u886193301_acidentes";
$db = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $db) or die("Could not select database");

?>