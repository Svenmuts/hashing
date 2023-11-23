<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h2>Welkom, $username!</h2>";
    echo "<a href='logout.php'>Uitloggen</a>";
    // Hier kun je andere informatie van de gebruiker weergeven, zoals e-mailadres als dat is opgeslagen
} else {
    header("Location: login.html"); // Als er geen sessie is, ga terug naar het inlogscherm
    exit();
}
?>
