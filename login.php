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
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
