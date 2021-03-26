<?php

namespace HseEvents\Controller;

use HseEvents\Model\{Event, Student};
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\View\View;

class ViewEventController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;

    public function __construct(View $view, StudentRepository $studentRepository, EventRepository $eventRepository)
    {
        parent::__construct($view);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
    }

    public function __invoke(): void
    {
//        $a = null;
//        is_null($a);

        $data = [
            'currentEvent' => $this->eventRepository->find($_GET['eventId']),
            'currentUser' => null,
            'registeredToEvent' => []
//            'output' => null
        ];

        if (isset($_SESSION['username'])) {
            $data['currentUser'] = $this->studentRepository->findOneBy(['email' => $_SESSION['username']]);


            if (isset($_POST['regStudToEvent'])) {
                $res = $this->studentRepository->regToEvent($data['currentUser'], $data['currentEvent']->getId());
                if ($res == true)
                    $data['registeredToEvent']['success'] = "Регистрация прошла успешно";
                else
                    $data['registeredToEvent']['unsuccess'] = "Студент [id: " . $data['currentUser']->getId() . "] уже был зарегистрирован";
            }

            if (isset($_POST['unregStudFromEvent'])) {
                $res = $this->studentRepository->unregFromEvent($data['currentUser'], $data['currentEvent']->getId());
                if ($res == true)
                    $data['registeredToEvent']['success'] = "Регистрация отменена";
                else
                    $data['registeredToEvent']['unsuccess'] = "Студент [id: " . $data['currentUser']->getId() . "] не был зарегистрирован";
            }


        }


        $this->view->render('layout.phtml', 'singleEvent.phtml', $data);
    }
}

?>