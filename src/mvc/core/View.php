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
    public function renderView(array $params = []): string
    {
        return $this->view->render($params);
    }
}