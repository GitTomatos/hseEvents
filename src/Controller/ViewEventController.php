<?php

namespace HseEvents\Controller;

use HseEvents\Model\{Event, Student};
//use HseEvents\Http\Response;
use Symfony\Component\HttpFoundation\Response;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class ViewEventController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;

    public function __construct(TwigView $view, StudentRepository $studentRepository, EventRepository $eventRepository, Session $session)
    {
        parent::__construct($view, $session);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
//        $a = null;
//        is_null($a);
//dd($this->eventRepository->find($_GET['eventId']));
        $this->data = array_merge(
            [
                'currentEvent' => $this->eventRepository->find((int)$request->attributes->get('eventId')),
                'currentUser' => null,
                'registeredToEvent' => [],
            ],
            $this->data
        );
//        die("hello");
        if (isset($this->data['username'])) {
            $this->data['currentUser'] = $this->studentRepository->findOneBy(['email' => $this->data['username']]);

            if (isset($request->request->all()['regStudToEvent'])) {
                $res = $this->studentRepository->regToEvent($this->data['currentUser'], $this->data['currentEvent']->getId());
                if ($res == true)
                    $this->data['registeredToEvent']['success'] = "Регистрация прошла успешно";
                else
                    $this->data['registeredToEvent']['unsuccess'] = "Студент [id: " . $this->data['currentUser']->getId() . "] уже был зарегистрирован";
            }

            if (isset($request->request->all()['unregStudFromEvent'])) {
                $res = $this->studentRepository->unregFromEvent($this->data['currentUser'], $this->data['currentEvent']->getId());
                if ($res == true)
                    $this->data['registeredToEvent']['success'] = "Регистрация отменена";
                else
                    $this->data['registeredToEvent']['unsuccess'] = "Студент [id: " . $this->data['currentUser']->getId() . "] не был зарегистрирован";
            }


        }
//        dd($this->data);
        return new Response($this->view->render('singleEvent.twig', $this->data));
    }
}

