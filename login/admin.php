<?php
session_start();
$memberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
$errormessage = "";
$formSubmitted = isset($_POST['hidden']);
$ADMIN_ID = 3;
if(!isset($_SESSION['userID']) || ($_SESSION['roleID'] != $ADMIN_ID)){
    header("location: /login");
}
$txtUsername = $_POST["txtUsername"];
$txtEmail = $_POST["txtemail"];
$txtPassword = $_POST["txtPassword"];
$txtPassword2 = $_POST["txtPassword2"];
$cboRole = $_POST["cboRole"];
if($formSubmitted) {

if($txtUsername < 4){
    $errormessage = "Please make your username at least 4 characters long!";
}

    if ($txtPassword != $txtPassword2) {
        $errormessage = "Your Password must match verify password";
    } //todo: check username, email, etc... (separate else-if's
    else {
        include "../includes/db.php";
        $con = getDBConnection();


        try {
            $hashedPassword = md5($txtPassword . $memberKey);
            $query = "INSERT INTO members (memberName, memberemail, memberpassword, memberkey, roleid) VALUES (?, ?, ?, ?, ?);";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $txtUsername, $txtEmail, $hashedPassword, $memberKey, $cboRole);
            mysqli_stmt_execute($stmt);

            $txtUsername = "";
            $txtEmail = "";
            $txtPassword = "";
            $txtPassword2 = "";
            $cboRole = "";
        } catch (mysqli_sql_exception $ex) {
            $errormessage = $ex;
        }
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
            "email email-input"
            "password password-input"
            "password2 password-input2"
            "role role-input"
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
                    <h3>Add new member</h3>
                </div>
                <div class="username">
                    <label for="txtUsername">Username</label>
                </div>
                <div class="username-input">
                    <input type="text" name="txtUsername" id="txtUsername" value="<?=$txtUsername?>">
                </div>
                <div class="email">
                    <label for="txtemail">Email</label>
                </div>
                <div class="email-input">
                    <input type="text" name="txtemail" id="txtemail" value="<?=$txtEmail?>">
                </div>
                <div class="password">
                    <label for="txtPassword">Password</label>
                </div>
                <div class="Password-input">
                    <input type="Password" name="txtPassword" id="txtPassword" value="<?=$txtPassword?>">
                </div>
                <div class="password2">
                    <label for="txtPassword2">Verify Password</label>
                </div>
                <div class="Password-input2">
                    <input type="Password" name="txtPassword2" id="txtPassword2" value="<?=$txtPassword2?>">
                </div>
                <div class="role">
                    <label for="cboRole">Role</label>
                </div>
                <div class="role-input">
                   <select id="cboRole" name="cboRole">
                       <option value="1">Member</option>
                       <option value="2">Operator</option>
                       <option value="3">Admin</option>
                   </select>
                </div>

                <div class="error <?php echo $errormessage == "" ? "hidden" : " " ;?>">
                    <p><?=$errormessage;?></p>
                </div>
                <div class="grid-footer">
                    <input type="hidden" value="hidden" name="hidden" id="hidden">
                    <input type="submit" value="Add member">
                </div>
            </div>
        </form>
    </main>

</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>