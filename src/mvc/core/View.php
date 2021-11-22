<?php

namespace MVC\Core;

abstract class View
{
    /**
     * @var \Twig\TemplateWrapper
     */
    protected $view;

    /**
     * @param array $params
     * @return string
     */
    public abstract function renderView(array $params): string;
}