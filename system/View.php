<?php

namespace System;

class View
{
    public static function render(String $view, array $args = []): void
    {
        extract($args, EXTR_SKIP);
        $file = "../views/" . $view;
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception($file . " not found");
        }
    }

    public static function renderTemplate(String $view, array $args = []): void
    {
        static $twig  = null;
        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/views');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('session', $_SESSION);
            $filter = new \Twig\TwigFilter('errorMessage', 'displayErrors');
            $twig->addFilter($filter);
        }
        echo $twig->render($view, $args);
    }
}
