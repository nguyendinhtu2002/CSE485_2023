<?php
require_once('app/models/Article.php');
require_once("app/config/db.php");
require_once("router/Router.php");

class ArticleService{
    // Cac phuong thuc thao tac voi DB Server
    public static function getAllArticles(){
        $database = new ConnectDatabase();
        $pdo = $database->getConnection();
        $query = "SELECT * FROM article";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setId($row['id'])
                ->setTitle($row['title'])
                ->setContent($row['content'])
                ->setCreated($row['created'])
                ->setCategoryId($row['category_id'])
                ->setMemberId($row['member_id'])
                ->setImageId($row['image_id'])
                ->setPublished($row['published']);

            $articles[] = $article;
        }

        return $articles;
    }

    public static function  getDetails(){
        $router = new Router();
        $id = $router->extractIdFromUrl($_SERVER['REQUEST_URI']);

        try{
            $database = new ConnectDatabase();
            $pdo = $database->getConnection();
            if($pdo!=null){
                $sql = "SELECT * FROM article WHERE id = :id ";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                $articles = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $article = new Article();
                    $article->setId($row['id'])
                        ->setTitle($row['title'])
                        ->setContent($row['content'])
                        ->setCreated($row['created'])
                        ->setCategoryId($row['category_id'])
                        ->setMemberId($row['member_id'])
                        ->setImageId($row['image_id'])
                        ->setPublished($row['published'])
                        ->setSummary($row['summary']);
                    $articles[] = $article;
                }

                return $articles;
            }
        }
        catch (ErrorException $error){

        }

    }

    public static function addArticle(){
        try {
            $database = new ConnectDatabase();
            if (isset($_POST['btnAdd'])){
                $title = trim($_POST['title']);
                $summary = trim($_POST['summary']);
                $content = trim($_POST['content']);
                $category_id = trim($_POST['category_id']);
                $member_id = trim($_POST['member_id']);
                $published = trim($_POST['published']);
                if (empty($title) || empty($summary) || empty($content) || empty($category_id)||empty($member_id)||empty($published)) {
                    echo "<script>alert('Please enter all required fields');</script>";
                }
                else{
                    $pdo = $database->getConnection();
                    $sql = "INSERT INTO article (title, summary, content, category_id, member_id, published)
                        VALUES (:title, :summary, :content, :category_id, :member_id, :published)";

                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':summary', $summary);
                    $stmt->bindParam(':content', $content);
                    $stmt->bindParam(':category_id', $category_id);
                    $stmt->bindParam(':member_id', $member_id);
                    $stmt->bindParam(':published', $published);

                    if ($stmt->execute()) {
                        echo "<script>alert('Article inserted successfully.');</script>";
                    } else {
                        $errorMessage = "Error inserting article: " . $stmt->errorInfo()[2];
                        echo "<script>alert('$errorMessage');</script>";                    }
                }

            }
        }catch (ErrorException $e){
            echo  $e;
        }
    }

    public static function deleteArticle(){
        $router = new Router();
        $id = $router->extractIdFromUrl($_SERVER['REQUEST_URI']);
        try {
            $database = new ConnectDatabase();
            $pdo = $database->getConnection();
            $sql = "DELETE FROM article WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo "<script>alert('Article delete successfully.');</script>";
            } else {
                $errorMessage = "Error inserting article: " . $stmt->errorInfo()[2];
                echo "<script>alert('$errorMessage');</script>";
            }
        }catch (ErrorException $e){

        }
    }

    public static function updateArticle(){
        $router = new Router();
        $id = $router->extractIdFromUrl($_SERVER['REQUEST_URI']);
        try{
            $database = new ConnectDatabase();
            $pdo = $database->getConnection();
            if($pdo!=null){
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $summary = trim($_POST['summary']);
                $category_id = trim($_POST['category_id']);
                $member_id = trim($_POST['member_id']);
                $published = trim($_POST['published']);

                $sql = "UPDATE article SET title = :title, content = :content,summary= :summary,category_id = :category_id, member_id = :member_id, published = :published WHERE id = :id";
                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':category_id', $category_id);
                $stmt->bindParam(':summary', $summary);
                $stmt->bindParam(':member_id', $member_id);
                $stmt->bindParam(':published', $published);
                $stmt->bindParam(':id', $id);
                if ($stmt->execute()) {
                    echo "<script>alert('Article updated successfully.');</script>";
                    header("Location: /php/CSE485_2023/BTTH03/users");
                    exit();
                } else {
                    echo "<script>alert('Error updating article: " . $stmt->errorInfo()[2] . "');</script>";
                }
            }
        }
        catch (ErrorException $error){

        }
    }
}