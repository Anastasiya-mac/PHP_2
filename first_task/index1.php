<pre>
<?php

abstract class Product 
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;
}
//весовой
class Wt_product extends Product
{
    protected $weight;

    public function TotalCoast()
    {

    }
}
//цифровой
class Digital_product extends Product
{

    public function TotalCoast()
    {

    }
}
//штучный
class Count_product extends Product
{

    public function TotalCoast()
    {

    }
}