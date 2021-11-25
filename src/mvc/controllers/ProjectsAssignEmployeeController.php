<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Views\ProjectsAssignEmployeeView;

class ProjectsAssignEmployeeController extends Controller
{
    public function __construct()
    {
        $this->view = new ProjectsAssignEmployeeView();
    }

    public function handle(array $params = [])
    {
        $layout = $this->view->renderView($params);

        echo $layout;
    }
}