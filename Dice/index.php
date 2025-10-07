<?php
session_start();
$roll = [
        '<img src="dice_1.png" height="200">',
        '<img src="dice_2.png" height="200">',
        '<img src="dice_3.png" height="200">',
        '<img src="dice_4.png" height="200">',
        '<img src="dice_5.png" height="200">',
        '<img src="dice_6.png" height="200">'
];

$answer = "Ask me a question and I will provide the answer to your future";
$question = trim($_POST['question'] ?? '');


$randomIndex = mt_rand(0, count($roll) - 1);
$answer = $roll[$randomIndex];
$_SESSION['question'] = $question;


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
            <input type="text" name="question" id="question" value="<?=$question?>">
            <input type="submit" value="Reroll">
        </form>
        <p class="roll"><?=$roll?></p>
    </main>

</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>