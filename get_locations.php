<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "projetweb"; // Remplacez par le nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Préparer la requête SQL
$sql = "SELECT name, description, latitude, longitude, category FROM locations";
$result = $conn->query($sql);

$locations = array();

if ($result->num_rows > 0) {
    // Récupérer les résultats
    while($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
}

// Retourner les données en format JSON
header('Content-Type: application/json');
echo json_encode($locations);

$conn->close();
?>
