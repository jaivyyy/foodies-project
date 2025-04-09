<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$email = $_POST["email"];

// Maak verbinding met de database via PDO
$conn = require __DIR__ . "/db.php"; // Gebruik de PDO verbinding

// Controleer of het e-mailadres al bestaat
$sql = "SELECT * FROM user WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    die("Email is already in use"); // De e-mail bestaat al in de database
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Voeg de nieuwe gebruiker toe
$sql = "INSERT INTO user (name, email, password_hash) VALUES (:name, :email, :password_hash)";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':name', $_POST["name"], PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

try {
    if ($stmt->execute()) {
        header("location: login.php");
        exit;
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
