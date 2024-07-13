<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Articles - Site d'actualité</title>
</head>
<body>
    <header>
        <h1>Liste des articles</h1>
    </header>
    <main>
        <?php
        $json = file_get_contents('../backend/data/articles.json');
        $articles = json_decode($json, true);
        foreach ($articles as $article) {
            echo "<div>";
            echo "<h2><a href='article.php?id={$article['id']}'>{$article['title']}</a></h2>";
            echo "<p>{$article['description']}</p>";
            echo "</div>";
        }
        ?>
        <div>
            <button>Précédent</button>
            <button>Suivant</button>
        </div>
    </main>
   
    <script src="js/script.js"></script>
</body>
</html>
