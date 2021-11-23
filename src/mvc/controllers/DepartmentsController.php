<?php

namespace MVC\Controllers;

use MVC\Collections\DepartmentsCollection;
use MVC\Core\Controller;
use MVC\Models\DepartmentModel;
use MVC\Views\DepartmentsView;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->view = new DepartmentsView();
        $this->model = new DepartmentModel();
    }

    public function handle(array $params = [])
    {
        //test
        $departmentsCollectionTest[] = $this->model->setName('testObject')->setCreatedAt(1)->setUpdatedAt(1)->setId(1);

        $departmentsCollection = new DepartmentsCollection();
        $departmentsCollection = $this->model->selectAll();
        $departmentsList = $departmentsCollection->getElements();
        $layout = $this->view->renderView(['depts' => $departmentsList]);

        echo $layout;
    }

    public function add()
    {
        if (isset($_POST['save']) and $_POST['save'] = 'yes') {
            $this->model->setName(htmlspecialchars($_POST['name']));
            $success = $this->model->insert();

            if ($success) {
                header('Location: /departments', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $editor = new DepartmentsEditorController();
            $editor->handle(['page' => 'add']);
        }
    }

    public function remove(): void
    {
        $this->model->setId($_POST['id']);
        $success = $this->model->delete();

        if ($success) {
            header('Location: /departments', true, 302);
        } else {
            echo 'Something went wrong';
        }
    }

    public function edit()
    {
        $this->model->setId($_POST['id']);
        if (isset($_POST['save']) and $_POST['save'] = 'yes') {
            $this->model->setName(htmlspecialchars($_POST['name']));
            $success = $this->model->update();

            if ($success) {
                header('Location: /departments', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $editor = new DepartmentsEditorController();
            $editor->handle([
                'deptId' => $this->model->getId(),
                'page' => 'edit'
            ]);
        }
    }
}