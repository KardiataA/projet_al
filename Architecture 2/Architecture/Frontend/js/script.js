// script.js

// Confirmation de la déconnexion
document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien
    if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
        window.location.href = this.href; // Redirige vers logout.php
    }
});
