<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class HomeView extends View
{
    public function __construct()
    {
        $this->template = App::$twig->load('home.twig');
    }
}