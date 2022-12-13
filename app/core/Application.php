<?php

namespace app\core;
use config\Router;

define("ROOT", "C:/xampp/htdocs/cars-dashboard/");
define("CONTROLLER_PATH", ROOT. "app/core/");
define("MODEL_PATH", ROOT. "app/core/");
define("VIEW_PATH", ROOT. "app/core/");

require_once ROOT . "config/DB.php";
require_once ROOT . "config/Router.php";
require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';
require_once CONTROLLER_PATH . 'Controller.php';

class Application
{
    private Router $router;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->router = new Router();
    }

    public function run()
    {
        $this->router->run();
    }
}
