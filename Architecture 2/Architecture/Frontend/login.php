<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion - Site d'actualité</title>
</head>
<body>
    <header>
        <h1>Connexion</h1>
    </header>
    <main>
        <div class="login-container">
            <h2>Bienvenue sur notre site d'actualité</h2>
            <?php
            session_start();
            if (isset($_SESSION['message'])) {
                echo "<p class='message'>{$_SESSION['message']}</p>";
                unset($_SESSION['message']);
            }
            ?>
            <form action="auth.php" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" class="button">Se connecter</button>
            </form>
            <p>Pas encore de compte ? <a href="register.php">Inscrivez-vous ici</a></p>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Site d'actualité</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
