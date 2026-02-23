<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}
?>


<?php

require 'db_connect.php';

/* =========================
   DELETE SHOW
========================= */

if (isset($_GET["delete"])) {
    $id = intval($_GET["delete"]);
    $conn->query("DELETE FROM shows WHERE id = $id");
}

/* =========================
   ADD SHOW
========================= */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $show_date = $_POST["show_date"];
    $event_name = $_POST["event_name"];
    $venue = $_POST["venue"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $map_link = $_POST["map_link"];

    $stmt = $conn->prepare("INSERT INTO shows (show_date, event_name, venue, city, state, map_link) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $show_date, $event_name, $venue, $city, $state, $map_link);
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Shows</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="admin-wrapper">

    <div class="admin-card">

        <h2>Add New Show</h2>

        <form method="POST" class="admin-form">
            <input type="date" name="show_date" required>
            <input type="text" name="event_name" placeholder="Event Name" required>
            <input type="text" name="venue" placeholder="Venue" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="state" placeholder="State" required>
            <input type="text" name="map_link" placeholder="Map Link (optional)">
            <button type="submit">Add Show</button>
        </form>

        <h2>Current Shows</h2>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Venue</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Delete</th>
                </tr>

</body>
</html>
