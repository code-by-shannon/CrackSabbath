<?php require 'db_connect.php'; ?>



<?php require 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- 🔥 This was missing -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            and apocalyptic atmosphere of <br><span>Black Sabbath</span>
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

    <section class="video">
    <h2 class="toggle-summon">Summoning the Riffs</h2>

    <div class="video-wrapper">
        <iframe 
            src="https://www.youtube.com/embed/WZq1r0zuTZQ" 
            title="Crack Sabbath Live Performance"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
</section>

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
            <a class = 'booking_anchor' href="mailto:Glaserbeam@aol.com">
                booking@cracksabbath/<br>GlaserEntertainment
            </a>
        </p>
    </section>

    <footer>
    <a href="login.php">
        Admin
    </a>
</footer>

        
<script src='js/main.js'></script>
</body>
</html>
