<?php
include_once '../controllers/UserController.php';
include_once '../controllers/ArticleController.php';
include_once '../controllers/CategoryController.php';

header('Content-Type: application/json');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if ((isset($uri[2]) && $uri[2] == 'login')) {
    $userController = new UserController();
    $data = json_decode(file_get_contents('php://input'), true);
    $user = $userController->authenticate($data['email'], $data['password']);
    if ($user) {
        echo json_encode($user);
    } else {
        echo json_encode(['message' => 'Invalid credentials']);
    }
    exit();
}

if ((isset($uri[2]) && $uri[2] == 'articles')) {
    $articleController = new ArticleController();
    if (isset($uri[3])) {
        $article = $articleController->getArticleById($uri[3]);
        echo json_encode($article);
    } else {
        $articles = $articleController->getAllArticles();
        echo json_encode($articles);
    }
    exit();
}

if ((isset($uri[2]) && $uri[2] == 'categories')) {
    $categoryController = new CategoryController();
    $categories = $categoryController->getAllCategories();
    echo json_encode($categories);
    exit();
}
?>
