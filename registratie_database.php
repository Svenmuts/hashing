<?php

require "data.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash het wachtwoord met bcrypt
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Maak verbinding met de database (vervang de gegevens door je eigen databasegegevens)
        $db_host = $host;
        $db_name = $db;
        $db_user = $user;
        $db_pass = $pass;

        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Bereid de query voor om de gebruiker toe te voegen aan de database
        $stmt = $conn->prepare("INSERT INTO gebruiker (Gebruikersnaam, Hash_wachtwoord) VALUES (?, ?)");
        $stmt->execute([$username, $hashed_password]);

        echo "Registratie succesvol!";
        header("Location: login.html");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
