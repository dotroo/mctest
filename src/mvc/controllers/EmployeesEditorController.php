<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Views\EmployeesEditorView;

class EmployeesEditorController extends Controller
{
    public function __construct()
    {
        $this->view = new EmployeesEditorView();
    }

    public function handle(array $params = [])
    {
        $layout = $this->view->renderView($params);

        echo $layout;
    }
}