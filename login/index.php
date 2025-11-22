<?php

    session_start();
    $errormessage = '';

    $txtEmail = $_POST["txtEmail"];
    $txtPassword = $_POST["txtPassword"];
$formSubmitted = isset($_POST['hidden']);
if($formSubmitted) {
    include "../includes/db.php";
    $con = getDBConnection();
    try {
        $query = "SELECT * FROM members WHERE memberEmail = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $txtEmail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_array($result);
        if ($row != null) {

            $hashedPassword = $row["memberPassword"];
            $memberKey = $row["memberKey"];

            if (md5($txtPassword . $memberKey) == $hashedPassword) {
                //password matched

                $_SESSION['userID'] = $row["memberID"];
                $_SESSION["roleID"] = $row["roleID"];

                if ($row["roleID"] == 3) {

                    header("Location: admin.php");
                } else if ($row["roleID"] == 1) {
                    header("Location: member.php");
                }
            } else {
                $errormessage = "Email or Password was incorrect";
            }
        } else {
            $errormessage = "Email or Password was incorrect";
        }


    } catch (mysqli_sql_exception $ex) {
        $errormessage = $ex;
    }
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
    <link rel="stylesheet" href="css/grid.css">
    <style>
        .grid-containter{

            grid-template-areas:
            "grid-header grid-header"
            "username username-input"
            "password password-input"
            "error-message error-message"
            "grid-footer grid-footer"
        ;

        }
    </style>
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
        <form method="post">
            <div class="grid-containter">
                <div class="grid-header">
                    <h3>Member Login</h3>
                </div>
                <div class="Email">
                    <label for="txtEmail">Email</label>
                </div>
                <div class="Email-input">
                    <input type="text" name="txtEmail" id="txtEmail" value="<?=$txtEmail?>">
                </div>
                <div class="password">
                    <label for="txtPassword">Password</label>
                </div>
                <div class="Password-input">
                    <input type="Password" name="txtPassword" id="txtPassword" value="<?=$txtPassword?>">
                </div>

                <div class="error <?php echo $errormessage == "" ? "hidden" : " " ;?>">
                    <p><?=$errormessage;?></p>
                </div>
                <div class="grid-footer">
                    <input type="hidden" value="hidden" name="hidden" id="hidden">
                    <input type="submit" value="login">
                </div>
            </div>
        </form>
    </main>
    </main>

</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>