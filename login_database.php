<?php
session_start();

require "data.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Maak verbinding met de database (vervang de gegevens door je eigen databasegegevens)
        $db_host = $host;
        $db_name = $db;
        $db_user = $user;
        $db_pass = $pass;

        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Bereid de query voor om het gehashte wachtwoord op te halen
        $stmt = $conn->prepare("SELECT Id, Gebruikersnaam, Hash_wachtwoord FROM gebruiker WHERE Gebruikersnaam = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $hashed_password = $user['Hash_wachtwoord'];

            // Controleer het wachtwoord met password_verify()
            if (password_verify($password, $hashed_password)) {
                // Onthoud de gebruikersnaam in een sessie
                $_SESSION['username'] = $username;

                // Ga naar de landingspagina gebruikers_menu.php bij succesvol inloggen
                header("Location: gebruikers_menu.php");
                exit();
            } else {
                echo "Ongeldige gebruikersnaam of wachtwoord.";
            }
        } else {
            echo "Ongeldige gebruikersnaam of wachtwoord.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

