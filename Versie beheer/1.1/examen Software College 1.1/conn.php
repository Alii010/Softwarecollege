<?php
##Connectie maken met de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softwarecollege";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>



