<?php

namespace HseEvents\Controller;

use HseEvents\Model\Event;
use HseEvents\Repository\EventRepository;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;


class HomepageController extends Controller
{

    private EventRepository $repository;

//    public function __construct(PhpView $view, EventRepository $eventRepository)
    public function __construct(TwigView $view, EventRepository $eventRepository)
    {
        parent::__construct($view);
        $this->repository = $eventRepository;
    }

    public function __invoke(): string
    {
//        throw new \Exception();
        $this->data = array_merge(
            $this->data,
            [
                'events' => $this->repository->findAll(),
            ]
        );

//        dd($this->view);

        return $this->view->render('homepage.twig', $this->data);
    }
}

