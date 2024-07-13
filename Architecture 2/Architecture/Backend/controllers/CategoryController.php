<?php
class CategoryController {
    private $categoriesFile = '../data/categories.json';

    public function getAllCategories() {
        return json_decode(file_get_contents($this->categoriesFile), true);
    }
}
?>
