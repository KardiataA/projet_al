<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription - Site d'actualité</title>
</head>
<body>
    <header>
        <h1>Inscription</h1>
    </header>
    <main>
        <div class="register-container">
            <h2>Inscription sur notre site d'actualité</h2>
            <form action="process_register.php" method="POST">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" class="button">S'inscrire</button>
            </form>
            <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Site d'actualité</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
