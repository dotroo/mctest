<?php

namespace MVC\Models;

class ReportModel
{
    /**
     * @var ProjectModel
     */
    private $projectModel;

    /**
     * @var EmployeesModel[]
     */
    private $employeesOnProject;

    /**
     * @var int
     */
    private $budget;

    /**
     * @return int
     */
    public function getBudget(): int
    {
        return $this->budget;
    }

    /**
     * @param int $budget
     * @return ReportModel
     */
    public function setBudget(int $budget): ReportModel
    {
        $this->budget = $budget;
        return $this;
    }

    /**
     * @return ProjectModel
     */
    public function getProjectModel(): ProjectModel
    {
        return $this->projectModel;
    }

    /**
     * @param ProjectModel $projectModel
     * @return ReportModel
     */
    public function setProjectModel(ProjectModel $projectModel): ReportModel
    {
        $this->projectModel = $projectModel;
        return $this;
    }

    /**
     * @return EmployeesModel[]
     */
    public function getEmployeesOnProject(): array
    {
        return $this->employeesOnProject;
    }

    /**
     * @param EmployeesModel[] $employeesOnProject
     * @return ReportModel
     */
    public function setEmployeesOnProject(array $employeesOnProject): ReportModel
    {
        $this->employeesOnProject = $employeesOnProject;
        return $this;
    }
}