<!doctype html>
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
include "includes/header.php"
?>
<div id="three-column">
    <?php
    include "includes/nav.php"
    ?>
    <main>
        <?php
        /*$level = 1;*/

        for($i = 1; $i <= 6; $i++){
           echo "<h$i>test</h$i>";
        }
        for($e = 6; $e >= 1; $e--){
            echo "<h$e>test</h$e>";
        }
        $i = 1;
        while($i <= 6){
            echo "<h$i>test</h$i>";
            $i++;
        }

        while ($i >= 1){
            $i--;
            echo "<h$i>test</h$i>";
        }
        // test
        $a=100;
        $b=50;
        /*echo "<p>" . ($a + $b) . "</p>"*/

        $firstName = "jAcK";
        $lastName = "BeHnKe";
        $fullName = "$firstName $lastName";
//$fullName = strtolower("$firstName $lastName");
        //echo $fullName;
        echo strtolower($fullName);
        echo str_split($fullName);
        //var_dump(str_split($fullName))
        echo $fullName[0];
        ?>
    </main>

</div>
<?php
include "includes/footer.php"
?>
</body>
</html>