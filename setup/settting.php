<?php
/*This is used for setting up the database*/


$servername = "localhost";
$username = "root";
$password = "password";

function executeQuery($conn, $query) {
    if (mysqli_query($conn, $query)) {
        echo "<br> success";
    } else {
        echo "<br>" .mysqli_error($conn);
    }
}

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die(mysqli_connect_error());
}
echo "success";

$DB_NAME = "randomNumbers";
$query = "CREATE DATABASE " .$DB_NAME;
executeQuery($conn, $query);

$query = "USE " .$DB_NAME;
executeQuery($conn, $query);

$query = "CREATE TABLE Numbers(num INT,
PRIMARY KEY(num))";
executeQuery($conn, $query);

$query = "CREATE TABLE UsedNumbers(num INT,
PRIMARY KEY(num),
FOREIGN KEY(num) REFERENCES Numbers(num))";
executeQuery($conn, $query);

$query = "CREATE TABLE UnusedNumbers(num INT,
PRIMARY KEY(num),
FOREIGN KEY(num) REFERENCES Numbers(num))";
executeQuery($conn, $query);

for ($i=0; $i<=100; $i++) {
    $query = "INSERT INTO Numbers(num) VALUES($i)";
    executeQuery($conn, $query);

    $query = "INSERT INTO UnusedNumbers(num) VALUES($i)";
    executeQuery($conn, $query);
}

mysqli_close($conn)

?>