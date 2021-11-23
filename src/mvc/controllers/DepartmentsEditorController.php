<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Views\DepartmentsEditorView;

class DepartmentsEditorController extends Controller
{
    public function __construct()
    {
        $this->view = new DepartmentsEditorView();
    }

    public function handle(array $params = [])
    {

        $layout = $this->view->renderView($params);

        echo $layout;
    }
}