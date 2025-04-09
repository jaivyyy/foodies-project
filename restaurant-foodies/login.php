<?php

session_start();

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verbind met de database via require
    $conn = require __DIR__ . "/db.php"; // Gebruik de bestaande PDO-verbinding

    // Email van de gebruiker opzoeken in de database
    $sql = "SELECT * FROM user WHERE email = :email"; // Gebruik een placeholder
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $_POST["email"], PDO::PARAM_STR); // Bind de waarde aan de placeholder
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Haal het resultaat op als een associatieve array

    if ($user) {
        // Controleer het wachtwoord
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            // Voeg de succesmelding toe in de sessie
            $_SESSION["login_message"] = "Succesvol ingelogd!";

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true; // Login is ongeldig als de e-mail niet bestaat of het wachtwoord niet klopt
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    
    <style>
        /* Reset standaard marges en paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
        overflow: hidden; 
        height: 100%; 
        }

        body {
            display: flex; 
            align-items: flex-start; 
            justify-content: center;
            height: 100vh; 
            font-family: Arial, sans-serif; 
            background-color: #f0f0f0; 
            padding-top: 20px; 
        }

        form {
            width: 340px; 
            padding: 20px; 
            background-color: #fff; 
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            text-align: center; 
        }

        input, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px; 
            font-size: 16px; 
        }

        button {
            background-color: #007bff; 
            color: #fff; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; 
        }

        /* Notificatie stijl */
        .notification {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4caf50;
            color: white;
            padding: 15px;
            font-size: 16px;
            width: 100%;
            text-align: center;
            z-index: 9999;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease-in-out;
        }

        .notification.show {
            opacity: 1;
            visibility: visible;
        }

        /* Styling voor de foutmelding */
        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>

</head>
<body>
<?php
    require 'navbar.php';
?>
<?php if ($is_invalid): ?>
    <em class="error-message">Ongeldige login. Controleer uw gegevens.</em>
<?php endif; ?> 

<form method="post">
    <h1>Login</h1>

    <input 
        type="email" 
        name="email" 
        id="email" 
        placeholder="E-mailadres" 
        value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" 
        required
    >
    <input 
        type="password" 
        name="password" 
        id="password" 
        placeholder="Wachtwoord" 
        required
    >
    <button type="submit">Log in</button>
    <div class="form-footer">
        <p>Nog geen account? <a href="sign-up.php">Maak een account aan</a></p>
    </div>
</form>
</body>
</html>
