<?php

namespace MVC\Models;

use Db\Db;
use MVC\Collections\ProjectsCollection;
use MVC\Core\Model;
use MVC\Views\ProjectsEditorView;

class ProjectModel extends Model
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $created_at;

    /**
     * @var int
     */
    private $updated_at;

    /**
     * @var array
     * Строки имен сотрудников
     */
    private $employees;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProjectModel
     */
    public function setId(int $id): ProjectModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProjectModel
     */
    public function setName(string $name): ProjectModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    /**
     * @param int $created_at
     * @return ProjectModel
     */
    public function setCreatedAt(int $created_at): ProjectModel
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updated_at;
    }

    /**
     * @param int $updated_at
     * @return ProjectModel
     */
    public function setUpdatedAt(int $updated_at): ProjectModel
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * @param array $employees
     * @return ProjectModel
     */
    public function setEmployees(array $employees): ProjectModel
    {
        $this->employees = $employees;
        return $this;
    }

    public function addEmployee(string $name): ProjectModel
    {
        $this->employees[] = $name;
        return $this;
    }

    public function insert(): bool
    {
        $sql = 'INSERT INTO mcprojects(name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)';
        $params = [
            'name' => $this->getName(),
            'created_at' => time(),
            'updated_at' => time()
        ];
        Db::getInstance();
        $stmt = Db::request($sql, $params);

        return (bool)$stmt;
    }

    public function update(): bool
    {
        $sql = 'UPDATE mcprojects SET name=:name, updated_at=:updated_at WHERE id=:id';
        $params = [
            'name' => $this->getName(),
            'updated_at' => time(),
            'id' => $this->getId()
        ];
        Db::getInstance();
        $stmt = Db::request($sql, $params);

        return (bool)$stmt;
    }

    public function delete(): bool
    {
        $sql = 'DELETE FROM mcprojects WHERE id=?';
        Db::getInstance();
        $stmt = Db::request($sql, [$this->getId()]);

        return (bool)$stmt;
    }

    public function getProjectEmployees(): array
    {
        $sql = 'SELECT mcemployees.first_name, mcemployees.last_name FROM employees_projects JOIN mcemployees ON mcemployees.id=employees_projects.employee_id AND employees_projects.project_id=?';
        Db::getInstance();
        $stmt = Db::request($sql, [$this->getId()]);
        $employeeArray = Db::fetchAll($stmt);
        /* так как имя и фамилия хранятся в базе отдельно, они возвращаются как два разных элемента массива. Объединим их*/
        $employeesFullNamesArray = [];
        foreach ($employeeArray as $firstLastName) {
            $fullName = implode(' ', $firstLastName);
            $employeesFullNamesArray[] = $fullName;
        }

        return $employeesFullNamesArray;
    }

    public function selectAll(): ProjectsCollection
    {
        $sql = 'SELECT id, name, created_at, updated_at FROM mcprojects';
        Db::getInstance();
        $stmt = Db::request($sql);
        $projectsArray = DB::fetchAll($stmt);
        $projectsCollection = (new ProjectsCollection())->fromArray($projectsArray);
        /** @var ProjectModel $element */
        foreach ($projectsCollection->getElements() as $element) {
            $element->setEmployees($element->getProjectEmployees());
        }

        return $projectsCollection;
    }

    public function fromArray(array $array): self
    {
        $this->setId($array['id'])
            ->setName($array['name'])
            ->setCreatedAt($array['created_at'])
            ->setUpdatedAt($array['updated_at']);

        return $this;
    }
}