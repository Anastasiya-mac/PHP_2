<pre>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/myFolder/config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$controllerAction = $_GET['a'];

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller -> runAction($controllerAction);
}