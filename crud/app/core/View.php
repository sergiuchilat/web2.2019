<?php


class View
{
    public static function loadLayout($layoutName, $viewContent) {
        include "../app/layouts/{$layoutName}.php";
    }

    public static function render($viewName, $data = [])
    {
        include "../app/views/{$viewName}.php";
    }
}
