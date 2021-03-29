<?php

namespace HseEvents\Controller;

use HseEvents\Http\Request;
//use HseEvents\Http\Response;
use Symfony\Component\HttpFoundation\Response;
use HseEvents\Model\Event;
use HseEvents\Repository\EventRepository;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Session\Session;

class HomepageController extends Controller
{

    private EventRepository $repository;

//    public function __construct(PhpView $view, EventRepository $eventRepository)
    public function __construct(TwigView $view, EventRepository $eventRepository)
    {
        parent::__construct($view);
        $this->repository = $eventRepository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
//        $response = new Response($content = '', $status = 307, $headers = ["Location"=>"https://www.google.ru/"]);
//        return $response;
//        throw new \Exception();
        $this->data = array_merge(
            $this->data,
            [
                'events' => $this->repository->findAll(),
            ]
        );
//        throw new \Exception();
//        dd($_SESSION);

        $html = $this->view->render('homepage.twig', $this->data);
        return new Response($html);
    }
}

