<?php
// Start de sessie
session_start();

// Vernietig de sessie
session_destroy();

// Leid de gebruiker terug naar de inlogpagina
header("Location: login.html");
exit();
?>
