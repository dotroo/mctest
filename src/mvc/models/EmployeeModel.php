<?php

namespace MVC\Models;

use Db\Db;
use MVC\Collections\EmployeesCollection;
use MVC\Collections\ProjectsCollection;
use MVC\Core\Model;

class EmployeeModel extends Model
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var string
     */
    private $birthday;

    /**
     * @var int
     */
    private $salary;

    /**
     * @var int
     */
    private $departmentId;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * @var int
     */
    private $updatedAt;

    /**
     * @var DepartmentModel
     */
    private $departmentModel;

    /**
     * @var array
     * Массив объектов ProjectModel
     */
    private $projects;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return EmployeeModel
     */
    public function setId(int $id): EmployeeModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return EmployeeModel
     */
    public function setFirstName(string $firstName): EmployeeModel
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return EmployeeModel
     */
    public function setLastName(string $lastName): EmployeeModel
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSex(): string //wink-wink
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     * @return EmployeeModel
     */
    public function setSex(string $sex): EmployeeModel
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     * @return EmployeeModel
     */
    public function setBirthday(string $birthday): EmployeeModel
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @param int $salary
     * @return EmployeeModel
     */
    public function setSalary(int $salary): EmployeeModel
    {
        $this->salary = $salary;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDepartmentId(): ?int
    {
        return $this->departmentId;
    }

    /**
     * @param int $departmentId
     * @return EmployeeModel
     */
    public function setDepartmentId(int $departmentId): EmployeeModel
    {
        $this->departmentId = $departmentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return EmployeeModel
     */
    public function setCreatedAt(int $createdAt): EmployeeModel
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return EmployeeModel
     */
    public function setUpdatedAt(int $updatedAt): EmployeeModel
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getProjects(): ?array
    {
        return $this->projects;
    }

    /**
     * @param array $projects
     * @return EmployeeModel
     */
    public function setProjects(array $projects): EmployeeModel
    {
        $this->projects = $projects;
        return $this;
    }

    /**
     * @return DepartmentModel
     */
    public function getDepartmentModel(): DepartmentModel
    {
        return $this->departmentModel;
    }

    /**
     * @param DepartmentModel $departmentModel
     * @return EmployeeModel
     */
    public function setDepartmentModel(DepartmentModel $departmentModel): EmployeeModel
    {
        $this->departmentModel = $departmentModel;
        return $this;
    }

    public function insert(): bool
    {
        $sql = 'INSERT INTO mcemployees(first_name, last_name, sex, birthday, salary, department_id, created_at, updated_at)
            VALUES (:first_name, :last_name, :sex, :birthday, :salary, :department_id, :created_at, :updated_at)';
        $params = [
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'sex' => $this->getSex(),
            'birthday' => $this->getBirthday(),
            'salary' => $this->getSalary(),
            'department_id' => $this->getDepartmentId(),
            'created_at' => time(),
            'updated_at' => time()
        ];
        Db::getInstance();
        $stmt = Db::request($sql, $params);

        return (bool)$stmt;
    }

    public function update(): bool
    {
        $sql = 'UPDATE mcemployees SET first_name=:first_name, last_name=:last_name, sex=:sex, birthday=:birthday, salary=:salary, department_id=:department_id, updated_at=:updated_at WHERE id=:id';
        $params = [
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'sex' => $this->getSex(),
            'birthday' => $this->getBirthday(),
            'salary' => $this->getSalary(),
            'department_id' => $this->getDepartmentId(),
            'updated_at' => time(),
            'id' => $this->getId()
        ];
        Db::getInstance();
        $stmt = Db::request($sql, $params);

        return (bool)$stmt;
    }

    public function delete(): bool
    {
        $sql = 'DELETE FROM mcemployees WHERE id=?';
        Db::getInstance();
        $stmt = Db::request($sql, [$this->getId()]);

        return (bool)$stmt;
    }

    public function selectById(int $id): array
    {
        $sql = 'SELECT id, first_name, last_name, sex, birthday, salary, department_id FROM mcemployees WHERE id=?';
        Db::getInstance();
        $stmt = Db::request($sql, [$id]);
        $employee = Db::fetch($stmt);
        return $employee;
    }

    public function selectAvailableProjects(): array
    {
        $sql = 'SELECT id, name, created_at, updated_at FROM mcprojects WHERE mcprojects.id NOT IN (SELECT project_id from employees_projects WHERE employee_id=?)';
        Db::getInstance();
        $stmt = Db::request($sql, [$this->getId()]);
        $projectsArray = Db::fetchAll($stmt);
        $projectsCollection = (new ProjectsCollection())->fromArray($projectsArray);
        $projectsList = $projectsCollection->getElements();
        return $projectsList;
    }

    public function selectAll(): EmployeesCollection
    {
        $sql = 'SELECT id, first_name, last_name, sex, birthday, salary, department_id, created_at, updated_at FROM mcemployees';
        Db::getInstance();
        $stmt = Db::request($sql);
        $employeesArray = DB::fetchAll($stmt);
        $employeesCollection = (new EmployeesCollection())->fromArray($employeesArray);
        /** @var EmployeeModel $employee */
        foreach ($employeesCollection->getElements() as $employee) {
            $projectModelCollection = (new ProjectsCollection())->fromArray($employee->getEmployeeProjects());
            $projectsArray = $projectModelCollection->getElements();
            $employeeProjectNames = [];
            /** @var ProjectModel $project */
            foreach ($projectsArray as $project)
                $employeeProjectNames[] = $project->getName();
            $employee->setProjects($employeeProjectNames);

            $employeeDepartmentModel = new DepartmentModel();
            $employeeDepartmentArray = $employeeDepartmentModel->selectById($employee->getDepartmentId());
            if (!empty($employeeDepartmentArray)) {
                $employee->setDepartmentModel($employeeDepartmentModel->fromArray($employeeDepartmentArray));
            } else {
                $employee->setDepartmentModel(new DepartmentModel());
            }

        }

        return $employeesCollection;
    }

    public function fromArray(array $array): self
    {
        $this->setId($array['id'])
            ->setFirstName($array['first_name'])
            ->setLastName($array['last_name'])
            ->setSex($array['sex'])
            ->setBirthday($array['birthday'])
            ->setSalary($array['salary']);

        if (isset($array['department_id']))
            $this->setDepartmentId($array['department_id']);

        if (isset($array['created_at']))
            $this->setCreatedAt($array['created_at']);

        if (isset($array['updated_at']))
            $this->setUpdatedAt($array['updated_at']);

        return $this;
    }

    public function getEmployeeProjects(): array
    {
        $sql = 'SELECT mcprojects.id, mcprojects.name, mcprojects.created_at, mcprojects.updated_at FROM employees_projects JOIN mcprojects ON mcprojects.id=employees_projects.project_id AND employees_projects.employee_id=?';
        Db::getInstance();
        $stmt = Db::request($sql, [$this->getId()]);
        $projectsArray = Db::fetchAll($stmt);

        return $projectsArray;
    }


}