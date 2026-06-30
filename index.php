<?php require 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Sabbath</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- HERO TITLE and IMAGE -->    
    <section class="hero">
        <img src="imgs/crack_logo.png" alt="Crack Sabbath Logo">
        <p class="tagline">A Black Sabbath Tribute Experience</p>
    </section>

<!--  About and Elevator Pitch -->
    <section class="about">
        <h2 class="toggle">About</h2>
        <p id = 'elevator_pitch'>
            Crack Sabbath delivers the crushing riffs, haunting vocals,
            and apocalyptic atmosphere of <br><span>Black Sabbath</span>
        </p>
    </section>

<!-- MEDIA: Band Banner and Members Grid -->
    <section class="media">
    <!-- Full Band Banner -->
        <div class="band-banner">
            <img src="imgs/band_shot.png" alt="Crack Sabbath Full Band">
        </div>
    <!-- 2x2 Member Grid -->
        <div class="member-grid">
            <!-- Phillip -->
            <div class="member"><img src="imgs/div.png" alt="Guitarist"></div>
            <!-- Ken -->
            <div class="member"><img src="imgs/phillip.png" alt="Drummer"></div>
            <!-- Div -->
            <div class="member"><img src="imgs/ken.png" alt="Vocalist"></div>
            <!-- Shannon -->
            <div class="member"><img src="imgs/shannon.png" alt="Bassist"></div>
        </div>
    </section>

<!-- VIDEO -->
<section class="video">
    <h2 class="toggle-summon">Crack Sabbath Live!</h2>

    <div class="video-wrapper">
        <!-- Crack Sabbath Highlights Video -->
        <div class="video-card">
            <h3>Crack Sabbath Highlights</h3>
            <iframe src="https://www.youtube.com/embed/SmhspeLFxaI?si=yYWs6mTrR24z4mxa" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <!-- Never Say Die Video -->
        <div class="video-card">
        <h3>Never Say Die</h3>
        <iframe src="https://www.youtube.com/embed/hn71iRmeDAc?si=C0h-LFirASTJcXnF" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <!-- Iron Man Video -->
        <div class="video-card">
        <h3>Iron Man</h3>
        <iframe src="https://www.youtube.com/embed/N_bzFon7rw4?si=QN07PlCsDVdlo8NB" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <!-- Children of the Grave Video -->
        <div class="video-card">
        <h3>Children of the Grave</h3>
        <iframe src="https://www.youtube.com/embed/Bl6w6cUmoHQ?si=JJD_Bk_Z-eb72GA-" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- BAND BIO -->
<div class="band-bios">

<div class="bio">
    <h3><strong>Div</strong> – <span class="instrument">Lead Vocals</span></h3>
    <p>
      The youngest member of Crack Sabbath, Div brings fresh energy and a modern edge to the band’s classic Sabbath sound. Her vocals balance power and nuance, while her movement on stage adds dynamic spark to every performance. Outside the band, she continues developing solo projects and exploring new creative directions—new blood fueling old riffs.
    </p>
  </div>

<div class="bio">
    <h3><strong>Ken</strong> – <span class="instrument">Drums, Vocals</span></h3>
    <p>
      Raised in a deeply musical family, Ken has been immersed in music practically since birth. Self-taught on drums and guitar by age nine and forming bands soon after, he has spent decades writing, recording, and performing in tribute, cover, and original projects. Behind the kit, Ken combines experience, precision, and raw enthusiasm—driving every show with steady power and unmistakable presence.
    </p>
</div>

<div class="bio">
    <h3><strong>Philip</strong> – <span class="instrument">Guitar</span></h3>
    <p>
      Playing since 1995, Philip has built his style around heavy riffs and dark melody. Influenced by the riff-driven legacy of Black Sabbath and the unmistakable approach of Tony Iommi, he delivers thick tone, tight rhythm work, and expressive phrasing. His playing brings weight, groove, and atmosphere—anchoring the band’s sound with precision and grit.
    </p>
</div>

<div class="bio">
    <h3><strong>Shannon</strong> – <span class="instrument">Bass</span></h3>
    <p>
      Starting out in the avant-punk outfit Goddam Sam, Shannon has spent years in crowded honky-tonks where the beer’s cold, the dance floor’s full, and the amps run hot. He’s chicken-picked from San Diego to San Francisco to the neon glow of Las Vegas, delivering high-energy sets built for two-steppers, raised glasses, and long nights. Now holding down the low end in Crack Sabbath, he moves between outlaw country and Sabbath thunder without missing a beat.
    </p>
</div>
</div>
    
<!-- SHOWS -->    
<section class="shows">
    <div class='show-ozzy-pic-div'>
    <img class="ozzy" src="imgs/ozzy.png" alt="ozzy">
        <h2 class="toggle">upcoming shows</h2>
    </div>

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

<!-- SETLIST -->
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

<!-- BOOKING -->
    <section class="booking">
        <h2>Booking</h2>
        <p>
            For booking inquiries:<br>
            <a class = 'booking_anchor' href="mailto:Glaserbeam@aol.com">
                booking@cracksabbath/<br>GlaserEntertainment
            </a>
        </p>
    </section>

    
<!-- FOOTER -->    
    <footer>
    <a href="login.php">
        Admin
    </a>
</footer>

        
<script src='js/main.js'></script>
</body>
</html>
