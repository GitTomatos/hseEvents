<?php

namespace HseEvents\Controller;

use HseEvents\Repository\PointRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\PointRegistrationValidator;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;
use HseEvents\Model\{Student, Point};

class ViewEventPointsController extends Controller
{

    private StudentRepository $studentRepository;
    private PointRepository $pointRepository;

    public function __construct(TwigView $view, StudentRepository $studentRepository, PointRepository $pointRepository)
    {
        parent::__construct($view);
        $this->studentRepository = $studentRepository;
        $this->pointRepository = $pointRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function __invoke(): string
    {
        $this->data = array_merge(
            $this->data,
            [
                'eventId' => $_GET['eventId'],
                'currentUser' => null,
                'points' => null,
                'errors' => [],
            ]
        );

        $username = $_SESSION['username'] ?? null;
        if (isset($username)) {
            $this->data['currentUser'] = $this->studentRepository->findOneBy(["email" => $username]);
        }


        if (isset($_POST['regStudToPoint']) && isset($this->data['currentUser'])) {
            $regData = [
                'studentId' => $this->data['currentUser']->getId(),
                'pointId' => $_POST['pointId'],
            ];
            $validator = new PointRegistrationValidator($this->studentRepository);
            $validator->isValid($regData);
            if (!isset($validator->getErrors()['regErrors'])) {
                $this->studentRepository->regToPoint($this->data['currentUser']->getId(), $_POST['pointId']);
                $this->data['registeredToPoint']['success'] = "Регистрация прошла успешно";
            } else {
                $this->data['errors']['regErrors'] = $validator->getErrors()['regErrors'];
//                dd($this->data);
            }

//            $errors = $currentUser->regToPoint($_GET['eventId'], $_POST['pointId']);

        }

        if (isset($_POST['unregStudFromPoint']) && isset($this->data['currentUser'])) {
            $regData = [
                'studentId' => $this->data['currentUser']->getId(),
                'pointId' => $_POST['pointId'],
            ];

            $validator = new PointRegistrationValidator($this->studentRepository);
            $validator->isValid($regData);
            if (!isset($validator->getErrors()['unregErrors'])) {
                $this->studentRepository->unregFromPoint($this->data['currentUser']->getId(), $_POST['pointId']);
                $this->data['registeredToPoint']['success'] = "Регистрация отменена";
            } else {
                $this->data['errors']['regErrors'] = $validator->getErrors()['unregErrors'];
            }

        }


        $eventId = $_GET['eventId'];
        $this->data['points'] = $this->pointRepository->findAllEventPoints($eventId);

        return $this->view->render('eventPoints.twig', $this->data);
    }
}
