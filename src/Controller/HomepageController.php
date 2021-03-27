<?php

namespace HseEvents\Controller;

use HseEvents\Model\Event;
use HseEvents\Repository\EventRepository;
use HseEvents\View\PhpView;


class HomepageController extends Controller
{

    private EventRepository $repository;

    public function __construct(PhpView $view, EventRepository $eventRepository)
    {
        parent::__construct($view);
        $this->repository = $eventRepository;
    }

    public function __invoke(): string
    {
//        throw new \Exception();
        $data = [
            'events' => $this->repository->findAll(),
        ];

//        dd($data['events']);

        return $this->view->render('homepage.phtml', $data);
    }
}

