<?php

namespace HseEvents\Controller;

use HseEvents\Filter\SanitizingFilter;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\EventValidator;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;
use HseEvents\Model\{Student, Event};

class AccountController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;

    public function __construct(TwigView $view, StudentRepository $studentRepository, EventRepository $eventRepository)
    {
        parent::__construct($view);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function __invoke(): string
    {
        $this->data = array_merge(
            $this->data,
            [
                'postData' => $_POST,
                'currentUser' => null,
                'validationErrors' => null,
            ]
        );

        $username = $_SESSION['username'] ?? null;
        if (isset($username)) {
//            $this->data['currentUser'] = Student::findByEmail($username);
            $this->data['currentUser'] = $this->studentRepository->findOneBy(['email' => $username]);
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
                $this->data['validationErrors'] = $validator->getErrors();
            }
        }

//        $this->data = $this->model->get_data($_SESSION['username']);
        return $this->view->render('account.twig', $this->data);
    }
}

