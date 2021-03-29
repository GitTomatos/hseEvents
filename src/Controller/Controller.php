<?php
namespace HseEvents\Controller;

use HseEvents\Model\Model;
use HseEvents\Registry;
use HseEvents\Repository\RepositoryInterface;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;
use Twig\Environment;

abstract class Controller
{
//    public Model $model;
//    protected PhpView $view;
    protected TwigView $view;
    protected array $data;
//    protected RepositoryInterface $repository;

    public function __construct(TwigView $view)
    {
        $this->view = $view;
//        dd($_SESSION);
        $this->data = [
            'sessionUsername' => $_SESSION['username'] ?? null,
        ];
//        $this->repository = $repository;
    }

//    abstract public function __invoke(): void;
}

