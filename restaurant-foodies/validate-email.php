<?php

// Importeer de database-verbinding
$conn = require __DIR__ . "/db.php";

// Controleer of de parameter 'email' aanwezig is in de querystring
if (isset($_GET["email"])) {
    // Query voorbereiden om te controleren of de e-mail al bestaat
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $_GET["email"], PDO::PARAM_STR); // Bind de parameter veilig
    $stmt->execute();

    // Controleer of er resultaten zijn
    $is_available = $stmt->rowCount() === 0; // True als geen record gevonden is

    // Retourneer de JSON-response
    header("Content-Type: application/json");
    echo json_encode(["available" => $is_available]);
} else {
    // Als geen e-mailparameter is opgegeven
    header("Content-Type: application/json");
    echo json_encode(["error" => "Geen e-mail opgegeven"]);
}
