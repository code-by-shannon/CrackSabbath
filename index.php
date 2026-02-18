<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crack_sabbath";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crack Sabbath</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <section class="hero">
        <img src="imgs/crack_logo.png" alt="Crack Sabbath Logo">
        <p class="tagline">A Black Sabbath Tribute Experience</p>
    </section>

    <section class="about">
        <h2 class="toggle">About</h2>
        <p id = 'elevator_pitch'>
            Crack Sabbath delivers the crushing riffs, haunting vocals,
            and apocalyptic atmosphere of <br><span>Black Sabbath</span>.
        </p>
    </section>

    <section class="media">

        <!-- Full Band Banner -->
        <div class="band-banner">
            <img src="imgs/band_shot.png" alt="Crack Sabbath Full Band">
        </div>
    
        <!-- 2x2 Member Grid -->
        <div class="member-grid">
            <div class="member">
                <img src="imgs/div.png" alt="Guitarist">
            </div>
    
            <div class="member">
                <img src="imgs/phillip.png" alt="Drummer">
            </div>
    
            <div class="member">
                <img src="imgs/ken.png" alt="Vocalist">
            </div>
    
            <div class="member">
                <img src="imgs/shannon.png" alt="Bassist">
            </div>
        </div>
    
    </section>
    
    
    <section class="shows">
    <h2 class="toggle">upcoming shows</h2>
    <ul>

    <?php
    $sql = "SELECT * FROM shows ORDER BY show_date ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $formatted_date = date("F j", strtotime($row["show_date"]));

            echo "<li>";
            echo $formatted_date . " – ";
            echo htmlspecialchars($row["venue"]) . " – ";
            echo htmlspecialchars($row["city"]) . ", ";
            echo htmlspecialchars($row["state"]);

            if (!empty($row["map_link"])) {
                echo " | <a href='" . htmlspecialchars($row["map_link"]) . "' target='_blank'>Map</a>";
            }

            echo "</li>";
        }
    } else {
        echo "<li>No upcoming shows.</li>";
    }
    ?>

    </ul>
</section>


    <section class="setlist">
        <h2 class="toggle">Set List</h2>
    
        <div class="paper">
            <ul>
                <li>Hole in the Sky</li>
                <li>Never Say Die</li>
                <li>Iron Man</li>
                <li>Sweet Leaf</li>
                <li>War Pigs</li>
                <li>Fairies Wear Boots</li>
                <li>Children of the Grave</li>
                <li>Into the Void</li>
                <li>Snowblind</li>
                <li>Paranoid</li>
                <li>N.I.B.</li>
                <li>Killing Yourself to Live</li>
                <li>Changes</li>
                <li>Symptom of the Universe</li>
                <li>Shadow of the Wind</li>
                <li>Zero the Hero</li>
                <li>Wheels of Confusion</li>
            </ul>
        </div>
    </section>
    
    

    
    <section class="booking">
        <h2>Booking</h2>
        <p>
            For booking inquiries:<br>
            <a href="mailto:Glaserbeam@aol.com">
                booking@cracksabbath/GlaserEntertainment
            </a>
        </p>
    </section>
        
<script src='js/main.js'></script>
</body>
</html>
