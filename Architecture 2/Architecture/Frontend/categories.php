<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Catégories - Site d'actualité</title>
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
        main .category {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        main .category:hover {
            transform: translateY(-5px);
        }
        main .category h2 {
            color: #333;
            margin-top: 0;
            font-size: 24px;
        }
        main .category a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }
        main .category a:hover {
            color: #0056b3;
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
        <h1>Liste des catégories</h1>
    </header>
    <main>
        <?php
        $json = file_get_contents('../backend/data/categories.json');
        $categories = json_decode($json, true);
        foreach ($categories as $category) {
            echo "<div class='category'>";
            echo "<h2><a href='category.php?id={$category['id']}'>{$category['name']}</a></h2>";
            echo "</div>";
        }
        ?>
    </main>
   
    <script src="js/script.js"></script>
</body>
</html>
