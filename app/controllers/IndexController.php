<?php

namespace app\controllers;
use app\core\Controller;
use app\core\View;
use app\models\IndexModel;
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
        $loader = new Twig\Loader\FilesystemLoader('../app/');
        $twig = new Twig\Environment($loader);

        $this->pageData['title'] = 'Cars Dashboard';

        $indexModel = new IndexModel();
        $avPriceOfAllCars = $indexModel->getAvaragePriceOfAllCars();
        $this->pageData['avPriceOfAllCars'] = $avPriceOfAllCars;

        $avPriceOfTodayCars = $indexModel->getAvaragePriceOfTodayCars(date("2022-12-13"));
        $this->pageData['avPriceOfTodayCars'] = $avPriceOfTodayCars;

        $carsSoldLastYear = $indexModel->getSoldCars(date("Y-m-d"));
        $this->pageData['carsSoldLastYear'] = $carsSoldLastYear;

        $unsoldCars = $indexModel->getUnsoldCars();
        $this->pageData['unsoldCars'] = $unsoldCars;

        echo $twig->render($this->indexPage, $this->pageData);
    }
}
