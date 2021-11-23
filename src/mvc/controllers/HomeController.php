<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Views\HomeView;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->view = new HomeView();
    }

    public function handle(array $params = []): void
    {
        $layout = $this->view->renderView();

        echo $layout;
    }
}