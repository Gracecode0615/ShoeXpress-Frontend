<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ShoeXpress";

// Create connection
// $conn = mysqli_connect($servername, $username, $password);

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// Select database
// $db_selected = mysqli_select_db($conn, $dbname);
// if (!$db_selected) {
//     die("Database selection failed: " . mysqli_error($conn));
// }

$con =mysqli_connect("localhost","root", "");
$db = mysqli_select_db($con, "ShoeXpress");

?>
