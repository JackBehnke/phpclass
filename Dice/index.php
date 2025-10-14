<?php
session_start();

$roll1 = mt_rand(1, 6);
$roll2 = mt_rand(1, 6);
$roll3 = mt_rand(1, 6);
$roll4 = mt_rand(1, 6);
$roll5 = mt_rand(1, 6);
$yourroll = $roll1 + $roll2;
$opponentroll = $roll3 + $roll4 + $roll5;
if($yourroll < $opponentroll){
$result = "You Lose!";
}
if($yourroll > $opponentroll){
    $result = "You Win!";
}
if ($yourroll == $opponentroll){
    $result = "Tied!";
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jack's Website</title>

    <link rel="stylesheet" href="/Css/base.css">
</head>
<body>
<?php
include "../includes/header.php"
?>
<div id="three-column">
    <?php
    include "../includes/nav.php"
    ?>
    <main>
        <h2>Dice Roll!</h2>

        <form method="post">

            <input type="submit" value="Reroll">
        </form>
        <h3>Your Roll</h3>
        <p>Your Score: <?=$yourroll?></p>
        <p class="roll1"><img src="/img/dice_<?=$roll1?>.png"></p>
        <p class="roll2"><img src="/img/dice_<?=$roll2?>.png"></p>
        <h3>Opponents Roll</h3>
        <p>Opponents Score: <?=$opponentroll?></p>
        <p class="roll3"><img src="/img/dice_<?=$roll3?>.png"></p>
        <p class="roll4"><img src="/img/dice_<?=$roll4?>.png"></p>
        <p class="roll5"><img src="/img/dice_<?=$roll5?>.png"></p>
        <h1><?=$result?></h1>
    </main>

</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>