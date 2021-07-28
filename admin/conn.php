<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "nexhmedinnixha";

// DB TABLE INFO
$GLOBALS['info_table_name'] = "visitor_info";


// CONNECT TO DB
try {
	$GLOBALS['db'] = new PDO("mysql:host=". $servername.";dbname=".$db_name, $username, $password, array(PDO::ATTR_PERSISTENT => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false));
}
catch(PDOException $e) {
    echo $e->getMessage();
}
