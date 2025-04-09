<?php
if (isset($_SESSION["user_id"]))    {

    $mysqli = require __DIR__   .   "/db.php";

     $sql = "SELECT * FROM user WHERE id      // Use a prepared statement for safety
= ?";
     $stmt = $mysqli->prepare($sql);
     $stmt->bind_param("i", $_SESSION["user_id"]);
     $stmt->execute();
     $result = $stmt->get_result();
     $user = $result->fetch_assoc();
     $stmt->close();
} else {
    $user = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <title>Home</title>
</head>
<body>
<header>
    <?php
    require 'navbar.php';
    ?>
    </header>
<h1>Home</h1>
</body>
</html>