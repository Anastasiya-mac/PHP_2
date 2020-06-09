<pre>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/myFolder/services/Autoloader.php";

spl_autoload_register([new \services\Autoloader(), 'loadClass']);

$product = new \models\Product();
$product->setCategoryId(1)
    ->setDescription(1);

function foo(ModelInterface $object){
    var_dump($object->getById());
}

var_dump($product);

$cart = new \models\Cart();
var_dump($cart);