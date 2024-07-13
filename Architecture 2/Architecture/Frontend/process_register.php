<?php
// Vérification si la requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; // Vous devriez toujours hasher le mot de passe avant de le stocker

    // Validation minimale côté serveur
    if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
        // Gestion des erreurs si des champs requis sont vides
        header("Location: register.php?error=emptyfields&nom=".$nom."&prenom=".$prenom."&email=".$email);
        exit();
    } else {
        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Enregistrement des données dans un fichier JSON (à titre d'exemple)
        $newUser = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $hashedPassword // Stocker le mot de passe hashé
        );

        // Chemin vers le fichier JSON d'utilisateurs
        $jsonFile = '../backend/data/users.json';

        // Lecture du fichier JSON existant
        $jsonData = file_get_contents($jsonFile);
        $users = json_decode($jsonData, true);

        // Ajout du nouvel utilisateur
        $users[] = $newUser;

        // Écriture des données mises à jour dans le fichier JSON
        $jsonData = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $jsonData);

        // Redirection vers une page de confirmation ou de connexion
        header("Location: register.php?signup=success");
        exit();
    }
} else {
    // Redirection si la requête n'est pas POST
    header("Location: register.php");
    exit();
}
?>
