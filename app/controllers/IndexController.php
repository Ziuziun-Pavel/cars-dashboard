<?php

namespace app\controllers;
use app\core\Controller;
use app\core\View;
use Twig;

class IndexController extends Controller
{
    private string $indexPage = "/views/index.tpl.php";

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }

    public function index()
    {
        $this->pageData['title'] = 'Cars Dashboard';

        $loader = new Twig\Loader\FilesystemLoader('../app/');
        $twig = new Twig\Environment($loader);

        echo $twig->render($this->indexPage, $this->pageData);
    }
}