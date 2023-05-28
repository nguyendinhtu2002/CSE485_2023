<?php
require_once 'app/models/Article.php';
require_once('app/services/ArticleService.php');

class ArticleController
{
    public function index()
    {
        $articles = ArticleService::getAllArticles();
        include("app/Views/users/index.php");
    }


}






