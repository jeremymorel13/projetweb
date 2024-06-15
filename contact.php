<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte des données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Configuration de l'email
    $to = "jeremy13morel@gmail.com";
    $subject = "Nouvelle demande de contact";
    $headers = "From: " . $email;

    // Message
    $body = "Nom: $name\nEmail: $email\nMessage:\n$message";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message.";
    }
}
?>
