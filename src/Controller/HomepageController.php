<?php

namespace HseEvents\Controller;

use HseEvents\Model\Event;
use HseEvents\Repository\EventRepository;
use HseEvents\View\View;


class HomepageController extends Controller
{

    private EventRepository $repository;

    public function __construct(View $view, EventRepository $eventRepository)
    {
        parent::__construct($view);
        $this->repository = $eventRepository;
    }

    public function __invoke(): void
    {
//        throw new \Exception();
        $data = [
            'events' => $this->repository->findAll(),
        ];

//        dd($data['events']);

        $this->view->render('layout.phtml', 'homepage.phtml', $data);
    }
}

