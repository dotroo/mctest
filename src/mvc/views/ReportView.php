<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class ReportView extends View
{
    public function __construct()
    {
        $this->template = App::$twig->load('report.twig');
    }
}