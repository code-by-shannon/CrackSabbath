<?php
session_start();

require 'db_connect.php';


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username_input = $_POST["username"];
    $password_input = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password_input, $user["password"])) {
            $_SESSION["logged_in"] = true;
            header("Location: add_show.php");
            exit;
        } else {
            $error = "Invalid password.";
        }

    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin login for Crack Sabbath management panel.">
    <title>Admin Login | Crack Sabbath</title>

    <link rel="stylesheet" href="css/styles.css?v=1">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        <h2>Admin Login</h2>

        <?php if ($error) echo "<p class='error'>$error</p>"; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>

</body>
</html>
