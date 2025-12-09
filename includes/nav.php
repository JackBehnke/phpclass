<?php
$isHome = $_SERVER['REQUEST_URI'] == '/' ? 'selected' : '';
$isLoops = $_SERVER['REQUEST_URI'] == '/loops/' ? 'selected' : '';
$isCountdown = $_SERVER['REQUEST_URI'] == '/countdown/' ? 'selected' : '';
$isMagic8Ball = $_SERVER['REQUEST_URI'] == '/magic-8ball/' ? 'selected' : '';
$isDice = $_SERVER['REQUEST_URI'] == '/dice/' ? 'selected' : '';
$isMovieList = $_SERVER['REQUEST_URI'] == '/movielist/' ? 'selected' : '';
$isCustomerDatabase =  $_SERVER['REQUEST_URI'] == '/Customer-Database/' ? 'selected' : '';
$isLogin = $_SERVER['REQUEST_URI'] == '/login/' ? 'selected' : '';
$isMarathon = $_SERVER['REQUEST_URI'] == '/marathon/' ? 'selected' : '';

?><nav>


    <ul>
        <li class="<?=$isHome?>"><a href="/">Home</a></li>
        <li class="<?=$isLoops?>"><a href="/loops">Loops</a></li>
        <li class="<?=$isCountdown?>"><a href="/countdown">Countdown</a></li>
        <li class="<?=$isMagic8Ball?>">
            <a href="/magic-8ball">Magic 8 Ball</a>
        </li>
        <li class="<?=$isDice?>"><a href="/Dice">Dice</a></li>
        <li class="<?=$isMovieList?>"><a href="/movielist">Movie List</a></li>
        <li class="<?=$isCustomerDatabase?>"><a href="/Cutomer-Database">Customer Database</a></li>
        <li class="<?=$isLogin?>"><a href="/login">Login</a></li>
        <li class="<?=$isMarathon?>"><a href="/marathon/public/" target="_blank">Marathon</a></li>
    </ul>
</nav>
