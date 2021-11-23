<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class DepartmentsView extends View
{
    public function __construct()
    {
        $this->view = App::$twig->load('departments.twig');
    }
}