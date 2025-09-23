<?php
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
?><!doctype html>
<html>
<head>
    <title>Testing Get and Post</title>
</head>
<body>
<h2> Welcome <?=$firstName?><?=$lastName?></h2>
    <form method="post">
    <input type="text" name="firstName" id="firstName" value="<?=$firstName?>"/>
    <input type="text" name="lastName" id="lastName" value="<?=$lastName?>"/>
    <input type="submit" value="Submit Data">

    </form>
</body>
</html>