<?php

namespace MVC\Controllers;

use MVC\Collections\ReportsCollection;
use MVC\Core\Controller;
use MVC\Models\EmployeeModel;
use MVC\Models\ProjectModel;
use MVC\Models\ReportModel;
use MVC\Views\ReportView;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->model = new ReportModel();
        $this->view = new ReportView();
    }

    public function handle(array $params = []): void
    {
        $reportsCollection = new ReportsCollection();
        $projectsCollection = (new ProjectModel())->selectAll();
        /** @var ProjectModel $projectModel */
        foreach ($projectsCollection->getElements() as $projectModel) {
            $reportsCollection->add(
                (new ReportModel())->setProjectModel($projectModel)
                            ->setEmployeesOnProject($projectModel->selectEmployeesOnProject())
            );
        }

        $reports = $reportsCollection->getElements();
        /** @var ReportModel $report */
        foreach ($reports as $report) {
            $reportBudget = 0;
            /** @var EmployeeModel $employee */
            foreach ($report->getEmployeesOnProject() as $employee) {
                $reportBudget += $employee->getSalary();
            }
            $report->setBudget($reportBudget);
        }

        usort($reports, function (ReportModel $a, ReportModel $b)
                { return $a->getBudget() < $b->getBudget(); }
        );

        $layout = $this->view->renderView(['report' => $reports]);

        echo $layout;
    }
}