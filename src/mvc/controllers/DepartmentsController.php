<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\DepartmentModel;
use MVC\Views\DepartmentsView;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->view = new DepartmentsView;
        $this->model = new DepartmentModel();
    }

    public function handle()
    {
        $departmentsCollection = $this->model->selectAll();
        $this->view->renderView($departmentsCollection);
    }
}