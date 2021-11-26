<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class EmployeesView extends View
{
    public function __construct()
    {
        $this->template = App::$twig->load('employees.twig');
    }
}