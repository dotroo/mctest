<?php

namespace MVC\Views;

use MVC\Core\App;
use MVC\Core\View;

class HomeView extends View
{
    public function __construct()
    {
        $this->view = App::$twig->load('home.twig');
    }

    public function renderView(array $params): string
    {
        return $this->view->render([$params]);
    }
}