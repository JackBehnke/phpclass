<?php
session_start();
$memberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
$errormessage = "";
$formSubmitted = isset($_POST['hidden']);

include "../includes/db.php";
$con = getDBConnection();

$ADMIN_ID = 3;
if(!isset($_SESSION['userID']) || ($_SESSION['roleID'] != $ADMIN_ID)){
    header("location: /login");
}
$txtUsername = $_POST["txtUsername"];
$txtEmail = $_POST["txtEmail"];
$txtPassword = $_POST["txtPassword"];
$txtPassword2 = $_POST["txtPassword2"];
$cboRole = $_POST["cboRole"];
//todo: check username, email, etc... (separate else-if's)
if($formSubmitted) {
    if(strlen($txtUsername) < 5){
        $errormessage = "Your username has to be at least 5 characters!";
    }
    else if(strlen($txtPassword) < 5){
        $errormessage = "Your Password has to be at least 5 characters!";
    }
    else if($txtPassword !== $txtPassword2){
        $errormessage = "Your Password has to equal confirm Password!";
    }
    else if($txtEmail == ""){
        $errormessage = "You must need an Email!";
    }
    else {

        try {
            $hashedPassword = md5($txtPassword . $memberKey);

            $query = "INSERT INTO members (memberName, memberEmail, memberPassword, memberKey, roleID) VALUES (?, ?, ?, ?, ?);";
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
            <div class="grid-containter"><!--I changed the name back only because it works with this name, sorry!-->
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
                    <label for="txtEmail">Email</label>
                </div>
                <div class="email-input">
                    <input type="text" name="txtEmail" id="txtEmail" value="<?=$txtEmail?>">
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
                       <?php
                       try{
                           $rs = mysqli_query($con, "Select * from roles");
                           if(!$rs){
                               echo "Query Failed" . mysqli_error($con);
                           }


                           while($row = mysqli_fetch_array($rs)){
                               $roleID = $row['roleID'];
                               $rolename = $row['rolename'];

                               echo "<option value='$roleID'>$rolename</option>";
                           }
                      }catch (mysqli_sql_exception $ex){
                          echo $ex;
                      }

                      ?>
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