<?php
$isHome = $_SERVER['REQUEST_URI'] == '/';
$isLoops = $_SERVER['REQUEST_URI'] == '/loops/';
$isCountdown = $_SERVER['REQUEST_URI'] == '/countdown/'

?><nav>


    <ul>
        <li class="<?=$isHome?>"><a href="/">Home</a></li>
        <li class="<?=$isLoops?>"><a href="/loops">Loops</a></li>
        <li class="<?=$isCountdown?>"><a href="/countdown">Countdown</a></li>
    </ul>
</nav>
