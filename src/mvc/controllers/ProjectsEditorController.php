<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Views\ProjectsEditorView;

class ProjectsEditorController extends Controller
{
    public function __construct()
    {
        $this->view = new ProjectsEditorView();
    }

    public function handle(array $params = [])
    {

        $layout = $this->view->renderView($params);

        echo $layout;
    }
}