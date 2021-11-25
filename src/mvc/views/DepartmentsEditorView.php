<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class DepartmentsEditorView extends View
{
    public function __construct()
    {
        $this->template = App::$twig->load('edit-dept.twig');
    }
}