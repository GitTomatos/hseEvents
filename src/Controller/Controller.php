<?php
namespace HseEvents\Controller;

use HseEvents\Model\Model;
use HseEvents\Registry;
use HseEvents\Repository\RepositoryInterface;
use HseEvents\View\View;

abstract class Controller
{
//    public Model $model;
    protected View $view;
//    protected RepositoryInterface $repository;

    public function __construct(View $view)
    {
        $this->view = $view;
//        $this->repository = $repository;
    }

//    abstract public function __invoke(): void;
}

