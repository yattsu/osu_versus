<?php
#security
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

$user1_count300 = $user1->count300;
$user1_count100 = $user1->count100;
$user1_count50 = $user1->count50;
$user1_playcount = $user1->playcount;
$user1_total_score = $user1->total_score;
$user1_best_pp = $user1->get_player_best()['pp'];

$user2_count300 = $user2->count300;
$user2_count100 = $user2->count100;
$user2_count50 = $user2->count50;
$user2_playcount = $user2->playcount;
$user2_total_score = $user2->total_score;
$user2_best_pp = $user2->get_player_best()['pp'];

$user1_points = ($user1_best_pp * 10) + ($user1_total_score / (1000000 + (100000 * ((($user1_count300 / $user1_count100) - $user1_count50) / $user1_playcount))));
$user2_points = ($user2_best_pp * 10) + ($user2_total_score / (1000000 + (100000 * ((($user2_count300 / $user2_count100) - $user2_count50) / $user2_playcount))));

?>