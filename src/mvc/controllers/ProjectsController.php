<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\ProjectModel;
use MVC\Views\ProjectsView;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->view = new ProjectsView();
        $this->model = new ProjectModel();
    }

    public function handle(array $params = [])
    {
        $projectsTest[] = $this->model->setId(1)->setName('testProject')->setCreatedAt(time())->setUpdatedAt(time())->setEmployees(['emp1', 'emp2']);

        $layout = $this->view->renderView(['projects' => $projectsTest]);

        echo $layout;
    }
}