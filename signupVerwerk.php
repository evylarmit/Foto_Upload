<?php
// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de ingevulde gegevens op
    $username = $_POST['username'];
    $password = $_POST['password']; // Het wachtwoord wordt niet gehasht voor opslag

    // Maak verbinding met de database (zie config.php voor de databaseverbinding)
    include 'config.php';

    // Controleer of de gebruikersnaam al bestaat in de database
    $check_query = "SELECT * FROM Upload_login WHERE username='$username'";
    $check_result = mysqli_query($mysqli, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Als de gebruikersnaam al bestaat, geef een foutmelding weer
        echo "Deze gebruikersnaam is al in gebruik. Kies een andere gebruikersnaam.";
    } else {
        // Voeg de nieuwe gebruiker toe aan de database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Het wachtwoord wordt gehasht voordat het wordt opgeslagen
        $insert_query = "INSERT INTO Upload_login (username, password) VALUES ('$username', '$hashed_password')";
        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Als de gebruiker succesvol is toegevoegd, geef een succesbericht weer en stuur door naar inlogpagina
            echo "Registratie succesvol! U kunt nu <a href='inlog.php'>inloggen</a>.";
        } else {
            // Als er een fout optreedt bij het toevoegen van de gebruiker, geef een foutmelding weer
            echo "Er is een fout opgetreden bij het registreren. Probeer het later opnieuw.";
        }
    }

    // Sluit de databaseverbinding
    mysqli_close($mysqli);
}
?>