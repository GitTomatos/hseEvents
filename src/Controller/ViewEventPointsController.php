<?php

namespace HseEvents\Controller;

use HseEvents\Repository\PointRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\View\PhpView;
use HseEvents\Model\{Student, Point};

class ViewEventPointsController extends Controller
{

    private StudentRepository $studentRepository;
    private PointRepository $pointRepository;

    public function __construct(PhpView $view, StudentRepository $studentRepository, PointRepository $pointRepository)
    {
        parent::__construct($view);
        $this->studentRepository = $studentRepository;
        $this->pointRepository = $pointRepository;
    }

    public function __invoke(): string
    {
        $data = [
            'currentUser' => null,
            'points' => null
        ];

        $username = $_SESSION['username'] ?? null;
        $eventId = $_GET['eventId'];
        if (isset($username))
            $data['currentUser'] = $this->studentRepository->findOneBy(["email" => $username]);
        $data['points'] = $this->pointRepository->findAllEventPoints($eventId);

        return $this->view->render('eventPoints.phtml', $data);
    }
}
