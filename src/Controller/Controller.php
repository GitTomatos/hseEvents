<?php
namespace HseEvents\Controller;

use HseEvents\Model\Model;
use HseEvents\Registry;
use HseEvents\Repository\RepositoryInterface;
use HseEvents\View\PhpView;

abstract class Controller
{
//    public Model $model;
    protected PhpView $view;
//    protected RepositoryInterface $repository;

    public function __construct(PhpView $view)
    {
        $this->view = $view;
//        $this->repository = $repository;
    }

//    abstract public function __invoke(): void;
}

