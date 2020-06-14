<pre>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/myFolder/config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);


$product = (new app\models\Product())->getById(4);


$product->price = 9999;
$product->name = "!test";
$product->about = "example";
$product->update();

/*
$product->delete();

$product = new app\models\Product();

$product->name = "счастье";
$product->about = "платное";
$product->price = 20000;
$product->category_id = 3;

$product->insert();*/