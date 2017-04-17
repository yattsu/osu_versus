<?php

#security
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

#database object
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/database.php';

$visitor = new database;
$visitor->connect();
$visitor->insert_user_data();

?>