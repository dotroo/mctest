<?php

namespace MVC\Core;

abstract class Controller
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var View
     */
    protected $view;

    public abstract function handle(array $params = []);
}