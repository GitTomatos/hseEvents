<?php

namespace Application\Controller;

use Laminas\View\Model\ViewModel;
use Application\Repository\EventRepository;

use Symfony\Component\HttpFoundation\Session\Session;

class HomepageController extends Controller
{

    private EventRepository $repository;
//
    public function __construct(EventRepository $eventRepository, Session $session)
    {
        parent::__construct($session);
        $this->repository = $eventRepository;
    }

    public function indexAction()
    {
        $a = $this->repository->findAll();
        $this->data = array_merge(
            $this->data,
            [
                'events' => $this->repository->findAll(),
                'a' => 'qwertyqwre',
            ]
        );

        return new ViewModel($this->data);
    }
}

