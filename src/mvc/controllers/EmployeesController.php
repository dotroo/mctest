<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\DepartmentModel;
use MVC\Models\EmployeeModel;
use MVC\Models\ProjectsEmployeesModel;
use MVC\Views\EmployeesView;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->view = new EmployeesView();
        $this->model = new EmployeeModel();
    }

    public function handle(array $params = [])
    {
        $employeesCollection = $this->model->selectAll();
        $employeesList = $employeesCollection->getElements();
        $layout = $this->view->renderView(['employees' => $employeesList]);

        echo $layout;
    }

    public function add()
    {
        if (isset($_POST['save']) and $_POST['save'] = 'yes') {
            $this->model->setFirstName(htmlspecialchars($_POST['firstName']))
                    ->setLastName(htmlspecialchars($_POST['lastName']))
                    ->setSex($_POST['sex'])
                    ->setBirthday($_POST['birthday'])
                    ->setSalary($_POST['salary'])
                    ->setDepartmentId((int)$_POST['dept']);
            $success = $this->model->insert();

            if ($success) {
                header('Location: /employees', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $editor = new EmployeesEditorController();
            $departmentsCollection = (new DepartmentModel())->selectAll();
            $departmentsList = $departmentsCollection->getElements();
            $editor->handle([
                'page' => 'add',
                'depts' => $departmentsList
            ]);
        }
    }

    public function edit()
    {
        $this->model->setId($_POST['id']);
        if (isset($_POST['save']) and $_POST['save'] = 'yes') {
            $this->model->setFirstName(htmlspecialchars($_POST['firstName']))
                ->setLastName(htmlspecialchars($_POST['lastName']))
                ->setSex($_POST['sex'])
                ->setBirthday($_POST['birthday'])
                ->setSalary($_POST['salary'])
                ->setDepartmentId((int)$_POST['dept']);
            $success = $this->model->update();

            if ($success) {
                header('Location: /employees', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $employeeFieldsArray = $this->model->selectById($this->model->getId());
            $departmentsCollection = (new DepartmentModel())->selectAll();
            $departmentsList = $departmentsCollection->getElements();
            $editor = new EmployeesEditorController();
            $editor->handle([
                'emplId' => $this->model->getId(),
                'empl' => $employeeFieldsArray,
                'depts' => $departmentsList,
                'page' => 'edit'
            ]);
        }
    }

    public function remove()
    {
        $this->model->setId($_POST['id']);
        $success = $this->model->delete();

        if ($success) {
            header('Location: /employees', true, 302);
        } else {
            echo 'Something went wrong';
        }
    }

    public function assign()
    {
        $this->model->setId($_POST['id']);
        if (isset($_POST['save']) && $_POST['save'] === 'yes') {
            $projectsEmployeesModel = (new ProjectsEmployeesModel())->setProjectId((int)$_POST['project'])->setEmployeeId((int)$_POST['id']);
            $success = $projectsEmployeesModel->insert();

            if ($success) {
                header('Location: /employees', true, 302);
            } else {
                echo 'Something went wrong';
            }
        } else {
            $assign = new EmployeesAssignProjectController();
            $availableProjects = $this->model->selectAvailableProjects();
            $assign->handle([
                'emplId' => $this->model->getId(),
                'projects' => $availableProjects
            ]);
        }

    }
}
