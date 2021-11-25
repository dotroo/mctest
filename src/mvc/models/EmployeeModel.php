<?php

namespace MVC\Models;

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
     * @var int
     */
    private $birthday;

    /**
     * @var int
     */
    private $salary;

    /**
     * @var int
     */
    private $created_at;

    /**
     * @var int
     */
    private $updated_at;

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
}