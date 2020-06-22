<?php
namespace app\models;

class Category extends Record
{
    public $category_id;
    public $id_product;
    public $description_category;

    public static function getTableName(): string
    {
        return "category";
    }
}