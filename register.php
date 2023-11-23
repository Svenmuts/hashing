<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Controleer of beide wachtwoorden gelijk zijn
    if ($password === $confirm_password) {
        // Hier kun je verdere verwerking toevoegen, zoals het opslaan van de gegevens in een database
        // In dit voorbeeld wordt de gebruikersnaam en het gehashte wachtwoord weergegeven
        echo "Gebruikersnaam: " . $username . "<br>";
        echo "Wachtwoord: " . $password; // Let op: in een echte applicatie zou je het wachtwoord hashen voordat je het opslaat
    } else {
        echo "De ingevoerde wachtwoorden komen niet overeen. Probeer opnieuw.";
    }
}
?>
