<?php

namespace Application\Controller;

use Application\Model\{Event, Student};
//use HseEvents\Http\Response;
use Laminas\View\Model\ViewModel;
use Symfony\Component\HttpFoundation\Response;
use Application\Repository\EventRepository;
use Application\Repository\StudentRepository;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class ViewEventController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;

    public function __construct(StudentRepository $studentRepository, EventRepository $eventRepository, Session $session)
    {
        parent::__construct($session);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function indexAction()
    {
//        $a = null;
//        is_null($a);
//dd($this->eventRepository->find($_GET['eventId']));
        $a = $this->params()->fromRoute('eventId');
        $this->data = array_merge(
            [
                'currentEvent' => $this->eventRepository->find((int)$this->params()->fromRoute('eventId')),
                'currentUser' => null,
                'registeredToEvent' => [],
            ],
            $this->data
        );
//        die("hello");
        if (isset($this->data['username'])) {
            $this->data['currentUser'] = $this->studentRepository->findOneBy(['email' => $this->data['username']]);

            if (isset($this->getRequest()->getPost()->toArray()['regStudToEvent'])) {
                $res = $this->studentRepository->regToEvent($this->data['currentUser'], $this->data['currentEvent']->getId());
                if ($res == true)
                    $this->data['registeredToEvent']['success'] = "Регистрация прошла успешно";
                else
                    $this->data['registeredToEvent']['unsuccess'] = "Студент [id: " . $this->data['currentUser']->getId() . "] уже был зарегистрирован";
            }

            if (isset($this->getRequest()->getPost()->toArray()['unregStudFromEvent'])) {
                $res = $this->studentRepository->unregFromEvent($this->data['currentUser'], $this->data['currentEvent']->getId());
                if ($res == true)
                    $this->data['registeredToEvent']['success'] = "Регистрация отменена";
                else
                    $this->data['registeredToEvent']['unsuccess'] = "Студент [id: " . $this->data['currentUser']->getId() . "] не был зарегистрирован";
            }


        }
//        dd($this->data);
        return new ViewModel($this->data);
    }
}

