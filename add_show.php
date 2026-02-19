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
    <style>
        body { font-family: Arial; padding: 2rem; }
        table { border-collapse: collapse; width: 100%; margin-top: 2rem; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
        button { padding: 6px 10px; }
        .delete { color: red; text-decoration: none; }
    </style>
</head>
<body>

<h2>Add New Show</h2>

<form method="POST">
    Date: <input type="date" name="show_date" required><br><br>
    Event Name: <input type="text" name="event_name" required><br><br>
    Venue: <input type="text" name="venue" required><br><br>
    City: <input type="text" name="city" required><br><br>
    State: <input type="text" name="state" required><br><br>
    Map Link: <input type="text" name="map_link"><br><br>

    <button type="submit">Add Show</button>
</form>

<h2>Current Shows</h2>

<table>
    <tr>
        <th>Date</th>
        <th>Event</th>
        <th>Venue</th>
        <th>City</th>
        <th>State</th>
        <th>Delete</th>
    </tr>

<?php

$sql = "SELECT * FROM shows ORDER BY show_date ASC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["show_date"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["event_name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["venue"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["city"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["state"]) . "</td>";
    echo "<td><a class='delete' href='?delete=" . $row["id"] . "' onclick='return confirm(\"Delete this show?\")'>Delete</a></td>";
    echo "</tr>";
}

?>

</table>

</body>
</html>
