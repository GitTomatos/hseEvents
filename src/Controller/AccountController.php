<?php

namespace HseEvents\Controller;

use HseEvents\Filter\SanitizingFilter;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\EventValidator;
use HseEvents\View\View;
use HseEvents\Model\{Student, Event};

class AccountController extends Controller
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

        $data = [
            'currentUser' => null,
            'validationErrors' => null
        ];

        $username = $_SESSION['username'] ?? null;
        if (isset($username)) {
//            $data['currentUser'] = Student::findByEmail($username);
            $data['currentUser'] = $this->studentRepository->findOneBy(['email' => $username]);
        } else {
            header("Location: ./");
        }


//        if (isset($_POST['readQr'])) {
//            require_once(get_template_directory() . "/qr/qr-decoder.php");
//            $res = decodeQr();
//            echo "Результат: " . $res;
//        }


        if (isset($_POST['addEvent'])) {
            $eventData = array();
            $eventData['name'] = !empty($_POST['eventName']) ? $_POST['eventName'] : null;
            $eventData['description'] = !empty($_POST['eventDescription']) ? $_POST['eventDescription'] : null;

            $validator = new EventValidator($this->eventRepository);
            if ($validator->isValid($eventData)) {
                $eventData = (new SanitizingFilter())->filter($eventData);
                $event = new Event($eventData['name'], $eventData['description']);
                $this->eventRepository->save($event);
                header("Location: ./");
            } else {
                $data['validationErrors'] = $validator->getErrors();
            }
        }


//        $data = $this->model->get_data($_SESSION['username']);
        $this->view->render('layout.phtml', 'account.phtml', $data);
    }
}

