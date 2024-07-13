<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gérer les catégories - Site d'actualité</title>
</head>
<body>
    <header>
        <h1>Gérer les catégories</h1>
    </header>
    <main>
        <?php
        session_start();
        if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] !== 'admin' && $_SESSION['user']['role'] !== 'editor')) {
            header('Location: login.php');
            exit();
        }

        $json = file_get_contents('../backend/data/categories.json');
        $categories = json_decode($json, true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];

            $new_category = [
                'id' => count($categories) + 1,
                'name' => $name,
            ];

            $categories[] = $new_category;
            file_put_contents('../backend/data/categories.json', json_encode($categories));
            header('Location: manage_categories.php');
            exit();
        }

        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $categories = array_filter($categories, function($category) use ($id) {
                return $category['id'] != $id;
            });
            file_put_contents('../backend/data/categories.json', json_encode($categories));
            header('Location: manage_categories.php');
            exit();
        }

        echo "<h2>Catégories</h2>";
        echo "<ul>";
        foreach ($categories as $category) {
            echo "<li>{$category['name']} - <a href='manage_categories.php?delete={$category['id']}' class='button delete'>Supprimer</a></li>";
        }
        echo "</ul>";
        ?>
        <h2>Ajouter une nouvelle catégorie</h2>
        <form action="manage_categories.php" method="POST">
            <label for="name">Nom de la catégorie</label>
            <input type="text" id="name" name="name" required>
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
