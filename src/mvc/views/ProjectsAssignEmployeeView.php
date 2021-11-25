<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class ProjectsAssignEmployeeView extends View
{
    public function __construct()
    {
        $this->template = App::$twig->load('assign-empl-to-project.twig');
    }
}