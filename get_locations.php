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

// Vérifier si la catégorie est définie dans l'URL
$category = isset($_GET['category']) ? $_GET['category'] : '';

if (!empty($category)) {
    // Préparer la requête SQL pour la catégorie spécifiée
    $stmt = $conn->prepare("SELECT name, description, latitude, longitude, category FROM locations WHERE category = ?");
    $stmt->bind_param("s", $category);
} else {
    // Préparer la requête SQL pour toutes les catégories (par défaut)
    $stmt = $conn->prepare("SELECT name, description, latitude, longitude, category FROM locations");
}

$stmt->execute();
$result = $stmt->get_result();

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

$stmt->close();
$conn->close();
?>
