<?php

namespace MVC\Core;

abstract class View
{
    /**
     * @var \Twig\TemplateWrapper
     */
    protected $template;

    /**
     * @param array $params
     * @return string
     */
    public function renderView(array $params = []): string
    {
        return $this->template->render($params);
    }
}