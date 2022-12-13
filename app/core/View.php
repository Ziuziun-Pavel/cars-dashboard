<?php

namespace app\core;

class View
{
    //$tpl is a template of page which we want to render
    //$pageData is data of every page
    public function render($tpl, $pageData): void
    {
        include ROOT. '/app/' .$tpl;
    }

    public function errorCode($code)
    {
        http_response_code($code);
        require $code;
        exit;
    }
}
