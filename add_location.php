<?php
// Configuration de la base de données
$servername = "localhost"; // Remplacez par le nom de votre serveur MySQL si différent
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "projetweb"; // Remplacez par le nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Vérifier si les données sont reçues
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $category = $_POST['category'];

    // Échapper les chaînes pour éviter les injections SQL
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $latitude = $conn->real_escape_string($latitude);
    $longitude = $conn->real_escape_string($longitude);
    $category = $conn->real_escape_string($category);

    // Préparer la requête SQL
    $sql = "INSERT INTO locations (name, description, latitude, longitude, category)
            VALUES ('$name', '$description', '$latitude', '$longitude', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau lieu ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
