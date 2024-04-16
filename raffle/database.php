<?php
$host = "localhost";
$username = "root"; // Your MySQL username
$password = "";     // Your MySQL password (leave empty for no password)
$database = "name_picker";

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
