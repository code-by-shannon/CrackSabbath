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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel for managing Crack Sabbath shows.">
    <title>Admin – Manage Shows | Crack Sabbath</title>

    <link rel="stylesheet" href="css/styles.css?v=1">
</head>

<body>

<div class="admin-wrapper">

    <div class="admin-card">
    <a href="index.php" class="admin-home">← Back to Site</a>
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
        </div>

    </div>
</div>

</body>
</html>
