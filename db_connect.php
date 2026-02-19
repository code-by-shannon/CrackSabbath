<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crack_sabbath";
} else {
    $servername = "localhost"; // SiteGround usually stays localhost
    $username = "sg_username";
    $password = "yourProductionPassword";
    $dbname = "sg_username_crack_sabbath";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
