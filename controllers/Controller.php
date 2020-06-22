<?php

namespace app\controllers;
use app\models\Product;

abstract class Controller {

    protected $defaultAction = 'index';
    protected $action;
    protected $useLayout = true;
    protected $layout = 'main';
    
    public function runAction($action = null) {
        $this -> $action = $action ?: $defaultAction;
        $method = "action" . ucfirst($action);
        if (method_exists($this, $method)) {
           $this -> $method();
        }
        else {
            echo "404";
        }
    }

    protected function renderTemplate($template, $params=[]) {
        ob_start();
        $templatePath = VIEWS_DIR . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}