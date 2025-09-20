<?php
$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;

$now = time();
$burningMan = mktime(12, 0,0, 8, 25, 2033);

$seconds = $burningMan - $now;

$years = floor($seconds / $secPerYear);
$seconds = $seconds - ($years * $secPerYear);
$days = floor($seconds / $secPerDay);
$seconds = $seconds - ($days * $secPerDay);

$hours = floor($seconds / $secPerHour);
$seconds = $seconds - ($hours * $secPerHour);
$minutes = floor($seconds / $secPerMin);
$seconds = $seconds - ($minutes * $secPerMin);

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
        <span> Years: <?=$years?></span>
        <span> Days: <?=$days?></span>
        <span> Hours: <?=$hours?></span>
        <span> Minutes: <?=$minutes?></span>
        <span> Seconds: <?=$seconds?></span>
    </main>

</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>