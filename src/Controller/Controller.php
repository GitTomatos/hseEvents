<?php
namespace HseEvents\Controller;

use HseEvents\Model\Model;
use HseEvents\Registry;
use HseEvents\View\View;

abstract class Controller
{
    public Model $model;
    public View $view;

    public function __construct()
    {
        $this->view = Registry::get("view");
    }

    abstract public function action(): void;
}

