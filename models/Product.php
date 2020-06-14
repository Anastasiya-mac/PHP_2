<?php
namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $about;
    public $price;
    public $category_id;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $about
     * @param $price
     * @param $category_id
     */
    public function __construct($id = null, $name = null, $about = null, $price = null, $category_id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->about = $about;
        $this->price = $price;
        $this->category_id = $category_id;
    }
    public function getTableName(): string
    {
        return "product";
    }
    
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }
}