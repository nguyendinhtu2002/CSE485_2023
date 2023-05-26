<?php
require_once('app/models/Article.php');

class ArticleService{
    // Cac phuong thuc thao tac voi DB Server
    public static function getAllArticles(){
        $articleModel = new Article();

        $articles = $articleModel->getAll();
        return $articles;
    }
}