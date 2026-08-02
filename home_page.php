<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="home_container"> 
        <h1>
        Welcome back,
        <span><?= $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></span>
        </h1>
        <button onclick="window.location.href='logout.php'">Logout</button>
    </div>
</body>
</html>