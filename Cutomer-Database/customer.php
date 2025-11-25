<?php



if(empty($_GET["id"])){
    header("location: /customer.php");
}

$CustomerID = $_GET["id"];

include "../includes/db.php";
$con = getDBConnection();

//do the update (update the db)
if(!empty($_POST["txtFirst"]) && !empty($_POST["txtLast"]) && !empty($_POST["txtAddress"]) && !empty($_POST["txtCity"]) && !empty($_POST["txtState"]) && !empty($_POST["txtZipcode"]) && !empty($_POST["txtPhone"]) && !empty($_POST["txtEmail"]) && !empty($_POST["txtPassword"])) {

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
        $query = "UPDATE Customerdatabase SET Firstname = ?, Lastname = ?, Address = ?, City = ?, State = ?, Zip_Code = ?, Phone = ?, Email = ?, Password = ? WHERE CutomerID = ?;";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssissii", $firstName, $lastName, $address, $city, $state, $zip_code, $phone, $email, $password, $CustomerID);
        mysqli_stmt_execute($stmt);
        header("Location: /Cutomer-Database");
    } catch (mysqli_sql_exception $ex) {
        echo $ex;

    }
}


try {
    $query = "SELECT * FROM Customerdatabase WHERE CutomerID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $CustomerID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_array($result);
    $firstName = $row["Firstname"];
    $lastName = $row["Lastname"];
    $address = $row["Address"];
    $city = $row["City"];
    $state = $row["State"];
    $zip_code = $row["Zip_Code"];
    $phone = $row["Phone"];
    $email = $row["Email"];
    $password = $row["Password"];
} catch (mysqli_sql_exception $ex) {
    echo $ex;
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
    <link rel="stylesheet" href="./css/grid.css">

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
                    <h3>Update Customer</h3>
                </div>
                <div class="first">
                    <label for="txtFirst">First Name</label>
                </div>
                <div class="first-input">
                    <input type="text" name="txtFirst" id="txtFirst" value="<?=$firstName;?>">
                </div>
                <div class="last">
                    <label for="txtLast">Last Name</label>
                </div>
                <div class="last-input">
                    <input type="text" name="txtLast" id="txtLast" value="<?=$lastName;?>">
                </div>
                <div class="address">
                    <label for="txtAddress">Address</label>
                </div>
                <div class="address-input">
                    <input type="text" name="txtAddress" id="txtAddress" value="<?=$address;?>">
                </div>
                <div class="City">
                    <label for="txtCity">City</label>
                </div>
                <div class="city-input">
                    <input type="text" name="txtCity" id="txtCity" value="<?=$city;?>">
                </div>
                <div class="state">
                    <label for="txtState">State</label>
                </div>
                <div class="state-input">
                    <input type="text" name="txtState" id="txtState" value="<?=$state;?>">
                </div>
                <div class="zipcode">
                    <label for="txtZipcode">Zip Code</label>
                </div>
                <div class="Zipcode-input">
                    <input type="text" name="txtZipcode" id="txtZipcode" value="<?=$zip_code;?>">
                </div>
                <div class="Phone">
                    <label for="txtPhone">Phone</label>
                </div>
                <div class="Phone-input">
                    <input type="text" name="txtPhone" id="txtPhone" value="<?=$phone;?>">
                </div>
                <div class="Email">
                    <label for="txtEmail">Email</label>
                </div>
                <div class="email-input">
                    <input type="text" name="txtEmail" id="txtEmail"  value="<?=$email;?>">
                </div>
                <div class="Password">
                    <label for="txtPassword">Password</label>
                </div>
                <div class="password-input">
                    <input type="password" name="txtPassword" id="txtPassword" value="<?=$password;?>">
                </div>

                <div class="grid-footer">
                    <input type="hidden" name="txtID" id="txtID" value="<?=$CustomerID?>">
                    <input type="submit" value="Update Customer">
                    <input type="button" value="Delete Customer" id="delete">
                </div>

            </div>
        </form>
    </main>

</div>
<?php
include "../includes/footer.php"
?>
<script>
    const deletebutton = document.querySelector('#delete')
    deletebutton.addEventListener('click', () => {
        window.location = './delete.php?id=<?=$CustomerID?>'
    })
</script>
</body>
</html>
