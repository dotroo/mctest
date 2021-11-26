<?php

namespace MVC\Collections;

use MVC\Models\EmployeeModel;

class EmployeesCollection extends ModelCollection
{
    public const ITEM_CLASS = EmployeeModel::class;
}