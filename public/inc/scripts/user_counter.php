<?php

#security
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

#database object
require_once $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/database.php';

$counter = new database;
$counter->connect();
echo $counter->unique_users();

?>