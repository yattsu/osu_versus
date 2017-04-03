<?php
#redirect
if (!$on_index) {
    header('Location: /osu!versus/public/index.php');
    die();
}

#error reporting
error_reporting(0);
?>