<html>
<head>
    <link rel="stylesheet" type="text/css" href="inc/css/main.css">
</head>
<body>
<div class="header_wrapper">
    <div class="header_content">
        osu!versus #beta
    </div>
</div>
<?php
#security
$on_index = true;
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

#update visitor
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/public/inc/scripts/update_visitor.php';

require_once 'inc/menu.php';
?>
<div class="content_wrapper">
    <div class="content">
        <div class="card_container">
            <div class="form_container">
                <form class="form" action="" method="get">
                    Please enter two player names below<br><br>
                    <input class="field" type="text" name="user1" autocomplete="off" placeholder="Player 1" autofocus>
                    VS
                    <input class="field" type="text" name="user2" autocomplete="off" placeholder="Player 2">
                    <input class="button" type="submit" name="submit" value="click!">
                    <div class="user_counter">
                        unique users: 
                        <?php
                        #display unique users
                        require_once $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/public/inc/scripts/user_counter.php';
                        ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="output">
            <?php

            @$user1_input = $_GET['user1'];
            @$user2_input = $_GET['user2'];
            @$submit = $_GET['submit'];

            if (isset($submit)) {
                if (empty(trim($user1_input)) || empty(trim($user2_input))) {
                    echo 'Fill both player names';
                } else {
                    require_once('../resources/inc/scripts/core.php');
                    $user1 = new Core;
                    $user1->set_username($user1_input);

                    $user2 = new Core;
                    $user2->set_username($user2_input);

                    require_once 'inc/scripts/user_battle.php';
                }
            }

            ?>
        </div>

        <?php
        require_once 'inc/info.php';
        ?>
    </div>
</div>
<?php
require_once 'inc/footer.php';
?>
</body>
</html>
