<?php
#security
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';
?>

<div class="card_container">
    <div class="info_title">
        What is this?
    </div>
    <div class="info_content">
        This is <strong>osu!versus</strong>. Do you know someone who isn't
        as better as you at osu! but he/she somehow manages to get a higher rank? I do. That's how I've come up with the idea of
        creating osu!versus. Using the amazing osu! API and some work, I've written a PHP script that go through the player data
        and calculates its performance. Different than the osu! ranking system, osu!versus also uses: the total of maps played, the total
        score (ranked and non ranked), the total of 300, 100 and 50 hits, and the highest pp rank of the player. With all the information, it creates a formula that calculate the
        final performance of the player. This is currenty in #beta stage, but I can say that it's accurate 99% of the time, meaning that it shows which player has a better performance
        and by how many points.<br><br>
    </div>
</div>