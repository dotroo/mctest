<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class EmployeesAssignProjectsView extends View
{
    public function __construct()
    {
        $this->template = App::$twig->load('assign-project-to-empl.twig');
    }
}