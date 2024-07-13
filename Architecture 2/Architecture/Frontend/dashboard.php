<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard - Site d'actualité</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 28px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            flex: 1;
        }
        .dashboard-links {
            margin-top: 20px;
        }
        .dashboard-links a {
            display: block;
            margin-bottom: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .dashboard-links a:hover {
            background-color: #0056b3;
        }
        .button.logout {
            background-color: #dc3545;
        }
        footer {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <div class="container">
        <main>
            <?php
            session_start();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $json = file_get_contents('../backend/data/users.json');
                $users = json_decode($json, true);
                foreach ($users as $user) {
                    if ($user['email'] === $email && $user['password'] === $password) {
                        $_SESSION['user'] = $user;
                        break;
                    }
                }

                if (!isset($_SESSION['user'])) {
                    echo "<p class='error'>Identifiants incorrects. Veuillez réessayer.</p>";
                    echo "<a href='login.php' class='button'>Retour à la page de connexion</a>";
                    exit();
                }
            }

            if (!isset($_SESSION['user'])) {
                header('Location: login.php');
                exit();
            }

            $user = $_SESSION['user'];
            echo "<h2>Bienvenue, {$user['name']}</h2>";
            echo "<div class='dashboard-links'>";
            if ($user['role'] === 'admin') {
                echo "<a href='manage_users.php' class='button'>Gérer les utilisateurs</a>";
            }
            echo "<a href='manage_articles.php' class='button'>Gérer les articles</a>";
            echo "<a href='manage_categories.php' class='button'>Gérer les catégories</a>";
            echo "<a href='logout.php' class='button logout'>Se déconnecter</a>";
            echo "</div>";
            ?>
        </main>
    </div>
    <footer>
        <p>&copy; 2024 Site d'actualité</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
