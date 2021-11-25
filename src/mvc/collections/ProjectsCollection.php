<?php

namespace MVC\Collections;

use MVC\Models\ProjectModel;

class ProjectsCollection extends ModelCollection
{
    public const ITEM_CLASS = ProjectModel::class;
}