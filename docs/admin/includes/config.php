<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','aimbfgnd_JJ-P1114');
define('DB_PASS','@N9l9z8d1');
define('DB_NAME','aimbfgnd_library');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>