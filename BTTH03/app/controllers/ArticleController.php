<?php
require_once ROOT_PATH . '/models/Article.php';
require_once ROOT_PATH.'/services/ArticleService.php';

class ArticleController
{
    public function index()
    {
        $articles = ArticleService::getAllArticles();
        include("app/Views/users/index.php");
    }
    public  function getViewCreate(){
        include("app/Views/users/create.php");
    }
    public  function createArticle(){
        $articles = ArticleService::addArticle();
        include("app/Views/users/create.php");
    }
    public  function getDetails(){
        $articles = ArticleService::getDetails();
        include("app/Views/users/update.php");
    }
    public  function Update(){
        $articles = ArticleService::updateArticle();
        include("app/Views/users/update.php");
    }
    public function deleteArticle(){
        $articles = ArticleService::deleteArticle();
        include("app/Views/users/index.php");
    }

}






