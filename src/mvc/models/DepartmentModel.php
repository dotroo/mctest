<?php

namespace MVC\Models;

use Db\Db;
use MVC\Collections\DepartmentsCollection;
use MVC\Core\Model;

class DepartmentModel extends Model
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
    private $createdAt;

    /**
     * @var int
     */
    private $updatedAt;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DepartmentModel
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @return DepartmentModel
     */
    public function setCreatedAt(int $createdAt): self
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
     * @return DepartmentModel
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DepartmentModel
     */
    public function setId(int $id): DepartmentModel
    {
        $this->id = $id;
        return $this;
    }

    public function insert(): bool
    {
        $sql = 'INSERT INTO mcdepts(name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)';
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
        $sql = 'UPDATE mcdepts SET name=:name, updated_at=:updated_at WHERE id=:id';
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
        $sql = 'DELETE FROM mcdepts WHERE id=?';
        Db::getInstance();
        $stmt = Db::request($sql, [$this->getId()]);

        return (bool)$stmt;
    }

    public function fromArray(array $array): self
    {
        $this->setId($array['id'])
            ->setName($array['name'])
            ->setCreatedAt($array['created_at'])
            ->setUpdatedAt($array['updated_at']);

        return $this;
    }

    public function selectAll(): DepartmentsCollection
    {
        Db::getInstance();
        $sql = 'SELECT id, name, created_at, updated_at FROM mcdepts';
        $stmt = Db::request($sql);
        $deptsArray = Db::fetchAll($stmt);
        $deptsCollection = (new DepartmentsCollection())->fromArray($deptsArray);
        return $deptsCollection;
    }

    public function selectById(?int $id): array
    {
        if ($id !== null) {
            Db::getInstance();
            $sql = 'SELECT id, name, created_at, updated_at FROM mcdepts WHERE id=?';
            $stmt = Db::request($sql, [$id]);
            return Db::fetch($stmt);
        } else {
            return [];
        }
    }

}