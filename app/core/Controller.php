<?php

namespace app\core;

abstract class Controller
{
    protected $view;
    public $pageData = [];

    public function __construct()
    {
        $this->view = new View();
    }
}
