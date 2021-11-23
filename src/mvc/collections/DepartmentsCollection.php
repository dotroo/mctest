<?php

namespace MVC\Collections;

use MVC\Core\ModelCollection;
use MVC\Models\DepartmentModel;

class DepartmentsCollection extends ModelCollection
{
    public const ITEM_CLASS = DepartmentModel::class;
}