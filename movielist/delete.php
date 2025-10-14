<?php
if(!empty($_GET["id"])){


include "../includes/db.php";
$con = getDBConnection();

$movieID = $_GET["id"];

try {
    $query = "DELETE FROM movielist WHERE MovieID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $movieID);
    mysqli_stmt_execute($stmt);
} catch (mysqli_sql_exception $ex) {
    echo $ex;
}
}
header("location: /movielist");