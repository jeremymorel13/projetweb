document.addEventListener('DOMContentLoaded', function() {
    // Validation de formulaire de contact
    var contactForm = document.querySelector('#contact form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            var name = document.getElementById('name').value.trim();
            var email = document.getElementById('email').value.trim();
            var message = document.getElementById('message').value.trim();

            if (!name || !email || !message) {
                alert('Tous les champs doivent être remplis.');
                e.preventDefault();
            } else {
                // Vous pouvez ajouter une validation plus approfondie ici
                alert('Message envoyé avec succès !');
            }
        });
    }

    // Validation de formulaire de connexion
    var loginForm = document.querySelector('#login form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            var email = document.getElementById('login-email').value.trim();
            var password = document.getElementById('login-password').value.trim();

            if (!email || !password) {
                alert('Email et mot de passe doivent être remplis.');
                e.preventDefault();
            } else {
                // Vous pouvez ajouter une validation plus approfondie ici
                alert('Connexion réussie !');
            }
        });
    }

    // Animation sur les cartes de la section catégories
    var cards = document.querySelectorAll('#categories .card');
    if (cards.length > 0) {
        cards.forEach(function(card) {
            card.addEventListener('mouseover', function() {
                card.classList.add('shadow-lg');
            });
            card.addEventListener('mouseout', function() {
                card.classList.remove('shadow-lg');
            });
        });
    }

    // Initialisation de la carte pour les pages de catégories
    var mapContainer = document.querySelector('#map-container');
    if (mapContainer) {
        console.log('Initialisation de la carte...');
        var map = L.map('map-container').setView([46.603354, 1.888334], 6); // Centré sur la France

        // Ajouter une couche de carte
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        console.log('Carte initialisée.');

        // Ajouter des marqueurs interactifs (exemple)
        var markers = [
            { lat: 48.8566, lon: 2.3522, popup: "Paris - Exemple de Lieu" },
            { lat: 43.6108, lon: 3.8778, popup: "Montpellier - Exemple de Lieu" }
        ];

        markers.forEach(function(marker) {
            L.marker([marker.lat, marker.lon]).addTo(map)
                .bindPopup(marker.popup);
        });

        console.log('Marqueurs ajoutés à la carte.');
    } else {
        console.error('Map container not found.');
    }
});
