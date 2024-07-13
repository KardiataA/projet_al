<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil - Site d'actualité</title>
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
        }
        main .article {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        main .article h2 {
            color: #333;
            margin-top: 0;
            font-size: 24px;
            margin-bottom: 10px;
        }
        main .article p {
            color: #666;
            line-height: 1.6;
        }
        .carousel-container {
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-image {
            width: 100%; /* Ajuste la largeur à 100% du conteneur */
            height: auto; /* Hauteur ajustée automatiquement selon l'aspect ratio */
            max-width: 100%; /* Ne pas dépasser la largeur maximale du conteneur */
            object-fit: cover; /* Évite que l'image soit déformée */
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s;
        }
        .pagination button:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>Bienvenue sur notre site d'actualité</h1>
    </header>
    <main>
        <div class="carousel-container">
            <div class="carousel-images">
            <img src="image/petrole0.jpeg" alt="Image 1" class="carousel-image">
                <img src="image/petrole1.jpeg" alt="Image 1" class="carousel-image">
                <img src="image/petrole2.jpeg" alt="Image 2" class="carousel-image">
                <img src="image/petrole3.jpeg" alt="Image 3" class="carousel-image">
                <img src="image/petrole4.jpeg" alt="Image 4" class="carousel-image">
                <img src="image/petrole5.jpeg" alt="Image 5" class="carousel-image">
                <img src="image/edu1.jpeg" alt="Image 5" class="carousel-image">
                <img src="image/edu2.jpeg" alt="Image 5" class="carousel-image">

            </div>
        </div>
        <?php
        $json = file_get_contents('../backend/data/articles.json');
        $articles = json_decode($json, true);
        foreach ($articles as $article) {
            echo "<div class='article'>";
            echo "<h2><a href='article.php?id={$article['id']}'>{$article['title']}</a></h2>";
            echo "<p>{$article['description']}</p>";
            echo "</div>";
        }
        ?>
        <div class="pagination">
            <button id="prevButton">Précédent</button>
            <button id="nextButton">Suivant</button>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Site d'actualité</p>
    </footer>
    <script src="js/script.js"></script>
    <script>
        // Script JavaScript pour le carrousel d'images
        const carouselImages = document.querySelector('.carousel-images');
        const images = [
            'image/petrole0.jpeg',
            'image/petrole1.jpeg',
            'image/petrole2.jpeg',
            'image/petrole3.jpeg',
            'image/petrole4.jpeg',
            'image/petrole5.jpeg'
            // Ajoutez plus de chemins d'images au besoin
        ];
        let index = 0;
        const intervalTime = 5000; // Temps entre chaque changement d'image en millisecondes

        function changeImage() {
            index++;
            if (index >= images.length) {
                index = 0;
            }
            carouselImages.style.transform = `translateX(${-index * 100}%)`;
        }

        setInterval(changeImage, intervalTime);
    </script>
</body>
</html>
