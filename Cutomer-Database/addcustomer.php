
<?php
session_start();
$memberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
$errormessage = "";

if(!empty($_POST["txtFirst"]) && !empty($_POST["txtLast"])) {
    include "../includes/db.php";
    $con = getDBConnection();
    $firstName = $_POST["txtFirst"];
    $lastName = $_POST["txtLast"];
    $address = $_POST["txtAddress"];
    $city = $_POST["txtCity"];
    $state = $_POST["txtState"];
    $zip_code = $_POST["txtZipcode"];
    $phone = $_POST["txtPhone"];
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];
    try {
        $hashedPassword = md5($password . $memberKey);
        $query = "INSERT INTO Customerdatabase (Firstname, Lastname, Address, City, State, Zip_Code, Phone, Email, Password, memberkey ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $firstName, $lastName, $address, $city, $state, $zip_code,$phone, $email, $hashedPassword, $memberKey);
        mysqli_stmt_execute($stmt);
        header("Location: /Cutomer-Database/");
    } catch (mysqli_sql_exception $ex) {
        $errormessage = $ex;
    }
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jack's Website</title>

    <link rel="stylesheet" href="/Css/base.css">
    <link rel="stylesheet" href="./css/grid.css">
    <style>
    .grid-container{
        grid-template-areas:
            "grid-header grid-header"
            "first first-input"
            "last last-input"
            "address address-input"
            "City city-input"
            "State state-input"
            "zipcode Zipcode-input"
            "Phone phone-input"
            "Email email-input"
            "Password password-input"
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
            <div class="grid-container">
                <div class="grid-header">
                    <h3>Add New Customer</h3>
                </div>
                <div class="first">
                    <label for="txtFirst">First Name</label>
                </div>
                <div class="first-input">
                    <input type="text" name="txtFirst" id="txtFirst">
                </div>
                <div class="last">
                    <label for="txtLast">Last Name</label>
                </div>
                <div class="last-input">
                    <input type="text" name="txtLast" id="txtLast">
                </div>
                <div class="address">
                    <label for="txtAddress">Address</label>
                </div>
                <div class="address-input">
                    <input type="text" name="txtAddress" id="txtAddress">
                </div>
                <div class="City">
                    <label for="txtCity">City</label>
                </div>
                <div class="city-input">
                    <input type="text" name="txtCity" id="txtCity">
                </div>
                <div class="state">
                    <label for="txtState">State</label>
                </div>
                <div class="state-input">
                    <input type="text" name="txtState" id="txtState">
                </div>
                <div class="zipcode">
                    <label for="txtZipcode">Zip Code</label>
                </div>
                <div class="Zipcode-input">
                    <input type="text" name="txtZipcode" id="txtZipcode">
                </div>
                <div class="Phone">
                    <label for="txtPhone">Phone</label>
                </div>
                <div class="Phone-input">
                    <input type="text" name="txtPhone" id="txtPhone">
                </div>
                <div class="Email">
                    <label for="txtEmail">Email</label>
                </div>
                <div class="email-input">
                    <input type="text" name="txtEmail" id="txtEmail">
                </div>
                <div class="Password">
                    <label for="txtPassword">Password</label>
                </div>
                <div class="password-input">
                    <input type="password" name="txtPassword" id="txtPassword">
                </div>

                <div class="error <?php echo $errormessage == "" ? "hidden" : " " ;?>">
                    <p><?=$errormessage;?></p>
                </div>
                <div class="grid-footer">
                    <input type="submit" value="Add Customer">
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