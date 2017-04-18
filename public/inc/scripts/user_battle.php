<div class="card_container">
<?php
#security
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

$user1_data = $user1->get_player_data();
$user1->set_properties();

$user2_data = $user2->get_player_data();
$user2->set_properties();

if (!$user1_data || !$user2_data) {
    echo 'One or both players could not be found...';
    echo '</div>';
    return;
}

require_once 'points_calculus.php';

echo $user1->set_points($user1_points);
echo $user2->set_points($user2_points);

echo '<div class="user_wrapper">';
    echo '<div class="user_wrapper_top">';
        echo '<div class="user_username">';
            echo '<a class="user_link" target="_blank" href="http://osu.ppy.sh/u/' . $user1->get_username() . '">' . $user1->get_username() . '</a><br>' . '(#' . number_format($user1->get_player_rank(), 0, '', ',') . ')';
        echo '</div>';
    echo '</div>';
    echo '<div class="user_wrapper_bottom">';
        if ($user1->get_points() >= $user2->get_points()) {
            echo '<div class="user_points" style="background-color: #a49cb4">';
        } else {
            echo '<div class="user_points" style="background-color: #5a526a">';
        }
            echo number_format($user1->get_points(), 0, '', ',');
        echo '</div>';
    echo '</div>';
echo '</div>';

echo '<div class="user_wrapper">';
    echo '<div class="user_wrapper_top">';
        echo '<div class="user_username">';
            echo '<a class="user_link" target="_blank" href="http://osu.ppy.sh/u/' . $user2->get_username() . '">' . $user2->get_username() . '</a><br>' . '(#' . number_format($user2->get_player_rank(), 0, '', ',') . ')';
        echo '</div>';
    echo '</div>';
    echo '<div class="user_wrapper_bottom">';
        if ($user2->get_points() >= $user1->get_points()) {
            echo '<div class="user_points" style="background-color: #a49cb4">';
        } else {
            echo '<div class="user_points" style="background-color: #5a526a">';
        }
            echo number_format($user2->get_points(), 0, '', ',');
        echo '</div>';
    echo '</div>';
echo '</div>';

echo '<div class="who_won">';
    if (($user1->get_points() > $user2->get_points())) {
        echo '<strong>' . $user1->get_username() . '</strong> won by a difference of <strong>' . number_format(($user1->get_points() - $user2->get_points()), 0, '', ',') . '</strong> points!';
    } elseif (($user1->get_points() < $user2->get_points())) {
        echo '<strong>' . $user2->get_username() . '</strong> won by a difference of <strong>' . number_format(($user2->get_points() - $user1->get_points()), 0, '', ',') . '</strong> points!';
    } else {
        echo 'It\'s a draw!';
    }
echo '</div>';

?>
</div>
