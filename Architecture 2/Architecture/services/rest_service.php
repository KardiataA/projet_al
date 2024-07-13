<?php
// Déterminer l'action à effectuer
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'getArticles':
            getArticles();
            break;
        case 'getArticlesByCategory':
            if (isset($_GET['category'])) {
                getArticlesByCategory($_GET['category']);
            } else {
                echo json_encode(array('error' => 'Category parameter is required'));
            }
            break;
        default:
            echo json_encode(array('error' => 'Invalid action'));
            break;
    }
}

// Fonction pour récupérer tous les articles
function getArticles() {
    $json = file_get_contents('../backend/data/articles.json');
    $articles = json_decode($json, true);
    echo json_encode($articles);
}

// Fonction pour récupérer les articles par catégorie
function getArticlesByCategory($category) {
    $json = file_get_contents('../backend/data/articles.json');
    $articles = json_decode($json, true);
    $filteredArticles = array_filter($articles, function ($article) use ($category) {
        return $article['category'] === $category;
    });
    echo json_encode($filteredArticles);
}
?>
