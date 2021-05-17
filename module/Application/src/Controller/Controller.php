<?php

namespace Application\Controller;

//use HseEvents\Http\Request;
//use HseEvents\Http\Response;
use Laminas\Mvc\Controller\AbstractActionController;
use Symfony\Component\HttpFoundation\Response;
//use Application\Model\Model;
//use Application\Registry;
use Application\Repository\RepositoryInterface;
//use HseEvents\View\PhpView;
//use HseEvents\View\TwigView;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

abstract class Controller extends AbstractActionController
{
//    public Model $model;
//    protected PhpView $view;
    protected array $data;
    protected Session $session;

//    protected RepositoryInterface $repository;

    public function __construct(Session $session)
//    public function __construct()
    {
        $this->session = $session;

        $this->data = [
            'username' => $session->get('username') ?? null,
            'userPermission' => $session->get('userPermission'),
        ];
    }

}

