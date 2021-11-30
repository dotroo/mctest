<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\ProjectModel;
use MVC\Models\ProjectsEmployeesModel;
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
        $projectsCollection = $this->model->selectAll();
        $projectsList = $projectsCollection->getElements();
        $layout = $this->view->renderView(['projects' => $projectsList]);

        echo $layout;
    }

    public function add()
    {
        if (isset($_POST['save']) && $_POST['save'] === 'yes') {
            $this->model->setName(htmlspecialchars($_POST['name']));
            $success = $this->model->insert();

            if ($success) {
                header('Location: /projects', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $editor = new ProjectsEditorController();
            $editor->handle(['page' => 'add']);
        }
    }

    public function edit()
    {
        $this->model->setId($_POST['id']);
        if (isset($_POST['save']) && $_POST['save'] === 'yes') {
            $this->model->setName(htmlspecialchars($_POST['name']));
            $success = $this->model->update();

            if ($success) {
                header('Location: /projects', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $editor = new ProjectsEditorController();
            $editor->handle([
                'projectId' => $this->model->getId(),
                'page' => 'edit'
            ]);
        }
    }

    public function remove(): void
    {
        $this->model->setId($_POST['id']);
        $success = $this->model->delete();

        if ($success) {
            header('Location: /projects', true, 302);
        } else {
            echo 'Something went wrong';
        }
    }

    public function assign()
    {
        $this->model->setId($_POST['id']);
        if (isset($_POST['save']) and $_POST['save'] = 'yes') {
            $projectsEmployeesModel = (new ProjectsEmployeesModel())->setEmployeeId((int)$_POST['employee'])->setProjectId((int)$_POST['id']);
            $success = $projectsEmployeesModel->insert();

            if ($success) {
                header('Location: /projects', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $assign = new ProjectsAssignEmployeeController();
            $availableEmployees = $this->model->selectEmployeesNotOnProject();
            $assign->handle([
                'projectId' => $this->model->getId(),
                'employees' => $availableEmployees
            ]);
        }

    }
}