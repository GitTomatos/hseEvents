<?php
namespace HseEvents\Controller;

use HseEvents\Model\Model;
use HseEvents\View\View;

abstract class Controller
{
    public Model $model;
    public View $view;

    public function __construct()
    {
        $this->view = View::getInstance();

    }

    abstract public function action(): void;
}

