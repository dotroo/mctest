<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Views\EmployeesAssignProjectsView;

class EmployeesAssignProjectController extends Controller
{
    public function __construct()
    {
        $this->view = new EmployeesAssignProjectsView();
    }

    public function handle(array $params = [])
    {
        $layout = $this->view->renderView($params);

        echo $layout;
    }
}