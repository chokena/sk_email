<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$host = "localhost";
$db = "db_alram";
$user = "root";
$pass = "itsuphan";
$connect = mysql_connect($host,$user,$pass);
mysql_query("SET NAMES UTF8",$connect); // เอาไว้กรณีให้บังคับตัวหนังสือเป็น UTF 8
mysql_select_db($db); 
?>