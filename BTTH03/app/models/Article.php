<?php
require_once("app/config/db.php");
class Article
{
    private $id, $title, $content, $created,$category_id, $member_id,$image_id,$published;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Article
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return Article
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     * @return Article
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * @param mixed $member_id
     * @return Article
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageId()
    {
        return $this->image_id;
    }

    /**
     * @param mixed $image_id
     * @return Article
     */
    public function setImageId($image_id)
    {
        $this->image_id = $image_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param mixed $published
     * @return Article
     */
    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }



    public function getAll(){
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

}