<?php
include 'config.php';

// Inlogverwerking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Wachtwoord wordt niet gehasht voordat het wordt vergeleken

    // Haal het gehashte wachtwoord op uit de database
    $sql = "SELECT * FROM Upload_login WHERE username='$username'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Controleer of het ingevoerde wachtwoord overeenkomt met het gehashte wachtwoord
        if (password_verify($password, $stored_password)) {
            // Wachtwoord is correct, start sessie en stuur door naar de startpagina
            session_start();
            $_SESSION['username'] = $username;
            header("Location: upload.php");
            exit();
        } else {
            echo "Ongeldige gebruikersnaam of wachtwoord.";
        }
    } else {
        echo "Ongeldige gebruikersnaam of wachtwoord.";
    }
}
?>
