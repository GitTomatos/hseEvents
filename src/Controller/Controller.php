<?php

namespace HseEvents\Controller;

use HseEvents\Http\Request;
//use HseEvents\Http\Response;
use Symfony\Component\HttpFoundation\Response;
use HseEvents\Model\Model;
use HseEvents\Registry;
use HseEvents\Repository\RepositoryInterface;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

abstract class Controller
{
//    public Model $model;
//    protected PhpView $view;
    protected TwigView $view;
    protected array $data;

//    protected RepositoryInterface $repository;

    public function __construct(TwigView $view, Session $session)
    {
        $this->view = $view;

        $this->data = [
            'username' => $session->get('username') ?? null,
            'userPermission' => $session->get('userPermission'),
        ];
    }

    abstract public function __invoke(SymfonyRequest $request, Session $session): Response;
}

