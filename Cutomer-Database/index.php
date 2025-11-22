<?php

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
            table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 80%;
            margin: 10px auto;
            table-layout: fixed;
        }
        table a {
            color: #1256d5;
        }
        table a:hover{
            text-decoration: underline;
        }
        th, td{
            border: 1px solid black;
            padding: .2rem;
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
       <table class="movies">
           <tr>
           <th>Customer ID</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Address</th>
           <th>City</th>
           <th>State</th>
           <th>Zip Code</th>
           <th>Phone</th>
           <th>Email</th>
           <th>Password</th>
           </tr>
           <?php
           include "../includes/db.php";
           $con = getDBConnection();
           $result = mysqli_query($con, "SELECT * FROM Customerdatabase");
           while($row = mysqli_fetch_array($result)){

               $customerID = $row["CutomerID"];
               $firstName = $row["Firstname"];
               $lastName = $row["Lastname"];
               $address = $row["Address"];
               $city = $row["City"];
               $state = $row["State"];
               $zipCode = $row["Zip_Code"];
               $phone = $row["Phone"];
               $email = $row["Email"];
               $password = $row["Password"];
               echo "<tr>";
               echo "    <td>$customerID</td>";
               echo "    <td>";
               echo "<a href=\"customer.php?id=$customerID\">$firstName</a>";
               echo "</td>";
               echo "";
               echo "    <td>$lastName</td>";
               echo "<td>$address</td>";
               echo "<td>$city</td>";
               echo "<td>$state</td>";
               echo "<td>$zipCode</td>";
               echo "<td>$phone</td>";
               echo "<td>$email</td>";
               echo "<td>$password</td>";
               echo "</tr>";

           }
           ?>

       </table>
        <a href="addcustomer.php">Add A New Customer</a>
    </main>

</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>