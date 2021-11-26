<?php

namespace MVC\Models;

use Db\Db;

class ProjectsEmployeesModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $employeeId;

    /**
     * @var int
     */
    private $projectId;

    /**
     * @return int
     */
    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }

    /**
     * @param int $employeeId
     * @return ProjectsEmployeesModel
     */
    public function setEmployeeId(int $employeeId): ProjectsEmployeesModel
    {
        $this->employeeId = $employeeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return ProjectsEmployeesModel
     */
    public function setProjectId(int $projectId): ProjectsEmployeesModel
    {
        $this->projectId = $projectId;
        return $this;
    }

    public function insert(): bool
    {
        $sql = 'INSERT INTO employees_projects(employee_id, project_id) VALUES (:employee_id, :project_id)';
        Db::getInstance();
        $params = [
            'employee_id' => $this->getEmployeeId(),
            'project_id' => $this->getProjectId()
        ];
        $stmt = Db::request($sql, $params);

        return (bool)$stmt;
    }
}