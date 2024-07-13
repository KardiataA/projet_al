<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Détails de l'article - Site d'actualité</title>
    <style>
        /* Styles spécifiques pour la page d'article */
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
            margin-bottom: 20px;
        }
        header h1 {
            margin: 0;
            font-size: 28px;
        }
        main {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            flex: 1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        main h2 {
            color: #333;
            margin-top: 0;
        }
        main p {
            color: #666;
            line-height: 1.6;
        }
        .back-button {
            background-color: #007bff;
            color: #fff;
            border-radius: 100px;
            transition: background-color 0.3s;
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px; 
            font-size: 16px; 
            text-decoration: none; 
            display: inline-block;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Détails de l'article</h1>
    </header>
    
    <a href="javascript:history.go(-1)" class="back-button">&larr; Retour</a> <!-- Bouton de retour -->

    <main>
        <?php
        $id = $_GET['id'];
        $json = file_get_contents('../backend/data/articles.json');
        $articles = json_decode($json, true);
        foreach ($articles as $article) {
            if ($article['id'] == $id) {
                echo "<h2>{$article['title']}</h2>";
                echo "<p>{$article['content']}</p>";
                echo "<p><strong>Catégorie :</strong> {$article['category']}</p>";
                echo "<p><strong>Auteur :</strong> {$article['author']}</p>";
                echo "<p><strong>Date :</strong> {$article['date']}</p>";
                break;
            }
        }
        ?>
    </main>
    
   
    <script src="js/script.js"></script>
</body>
</html>
