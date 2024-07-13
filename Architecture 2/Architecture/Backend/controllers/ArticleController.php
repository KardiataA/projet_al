<?php
class ArticleController {
    private $articlesFile = '../data/articles.json';

    public function getAllArticles() {
        return json_decode(file_get_contents($this->articlesFile), true);
    }

    public function getArticleById($id) {
        $articles = json_decode(file_get_contents($this->articlesFile), true);
        foreach ($articles as $article) {
            if ($article['id'] == $id) {
                return $article;
            }
        }
        return null;
    }
}
?>
