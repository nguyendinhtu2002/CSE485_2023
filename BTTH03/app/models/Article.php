<?php
class Article
{
    private $id, $title, $content, $created,$category_id, $member_id,$image_id,$published,$summary;

    /**
     * @param $id
     * @param $title
     * @param $content
     * @param $created
     * @param $category_id
     * @param $member_id
     * @param $image_id
     * @param $published
     * @param $summary
     */
    public function __construct()
    {

    }


    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     * @return Article
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function getMemberId()
    {
        return $this->member_id;
    }

    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;
        return $this;
    }

    public function getImageId()
    {
        return $this->image_id;
    }

    public function setImageId($image_id)
    {
        $this->image_id = $image_id;
        return $this;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }


}