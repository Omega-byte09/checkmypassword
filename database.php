<?php
// Connessione al database
$host = 'localhost';
$dbname = 'password_check';
$username = 'root';
$password = 'XservE/3/6/7';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Apri il file di password
$file = fopen('passwords.txt', 'r');
if ($file) {
    while (($password = fgets($file)) !== false) {
        // Rimuove eventuali spazi bianchi o newline
        $password = trim($password);

        // Hash della password usando bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Inserisci la password hashata nel database
        $stmt = $pdo->prepare('INSERT INTO passwords (password_hash) VALUES (:hashed_password)');
        $stmt->execute(['hashed_password' => $hashed_password]);
    }
    fclose($file);
    echo "Password inserite con successo dal file!";
} else {
    echo "Errore nell'apertura del file.";
}
?>
