<?php
namespace app\models;

class Category extends Model
{
    public $category_id;
    public $id_product;
    public $description_category;

    public function getTableName(): string
    {
        return "category";
    }
}