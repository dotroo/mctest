<?php

namespace MVC\Models;

use MVC\Core\Model;

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

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function fromArray(array $array)
    {
        // TODO: Implement fromArray() method.
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
}