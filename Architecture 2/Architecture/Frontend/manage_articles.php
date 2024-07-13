<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gérer les articles - Site d'actualité</title>
</head>
<body>
    <header>
        <h1>Gérer les articles</h1>
    </header>
    <main>
        <?php
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: login.php');
            exit();
        }

        $user = $_SESSION['user'];
        if ($user['role'] !== 'admin' && $user['role'] !== 'editor') {
            echo "<p class='error'>Accès refusé.</p>";
            exit();
        }

        $json = file_get_contents('../backend/data/articles.json');
        $articles = json_decode($json, true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $new_article = [
                'id' => count($articles) + 1,
                'title' => $title,
                'description' => $description,
            ];

            $articles[] = $new_article;
            file_put_contents('../backend/data/articles.json', json_encode($articles));
            header('Location: manage_articles.php');
            exit();
        }

        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $articles = array_filter($articles, function($article) use ($id) {
                return $article['id'] != $id;
            });
            file_put_contents('../backend/data/articles.json', json_encode($articles));
            header('Location: manage_articles.php');
            exit();
        }

        echo "<h2>Articles</h2>";
        echo "<ul>";
        foreach ($articles as $article) {
            echo "<li>{$article['title']} - <a href='manage_articles.php?delete={$article['id']}' class='button delete'>Supprimer</a></li>";
        }
        echo "</ul>";
        ?>
        <h2>Ajouter un nouvel article</h2>
        <form action="manage_articles.php" method="POST">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
            <button type="submit" class="button">Ajouter</button>
        </form>
        <a href="dashboard.php" class="button">Retour au tableau de bord</a>
    </main>
    <footer>
        <p>&copy; 2024 Site d'actualité</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
