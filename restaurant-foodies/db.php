<?php

try {
    $host = "localhost";
    $dbname = "foodies";
    $username = "root";
    $password = "";

    // Maak de PDO-verbinding
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Zorg ervoor dat fouten goed worden weergegeven

    // Retourneer de verbinding
    return $conn;

} catch (PDOException $e) {
    // Foutmelding als verbinding niet lukt
    die("Verbindingsfout: " . $e->getMessage());
}
