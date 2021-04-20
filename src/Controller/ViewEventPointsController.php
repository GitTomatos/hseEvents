<?php

namespace HseEvents\Controller;

//use HseEvents\Http\Response;
use Symfony\Component\HttpFoundation\Response;
use HseEvents\Repository\PointRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\PointRegistrationValidator;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;
use HseEvents\Model\{Student, Point};

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class ViewEventPointsController extends Controller
{

    private StudentRepository $studentRepository;
    private PointRepository $pointRepository;

    public function __construct(TwigView $view, StudentRepository $studentRepository, PointRepository $pointRepository, Session $session)
    {
        parent::__construct($view, $session);
        $this->studentRepository = $studentRepository;
        $this->pointRepository = $pointRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
        $this->data = array_merge(
            $this->data,
            [
                'eventId' => $request->attributes->get('eventId'),
                'currentUser' => null,
                'points' => null,
                'errors' => [],
            ]
        );

        $username = $session->get('username') ?? null;
        if (isset($username)) {
            $this->data['currentUser'] = $this->studentRepository->findOneBy(["email" => $username]);
        }


        if (isset($request->request->all()['regStudToPoint']) && isset($this->data['currentUser'])) {
            $regData = [
                'studentId' => $this->data['currentUser']->getId(),
                'pointId' => $request->request->all()['pointId'],
            ];
            $validator = new PointRegistrationValidator($this->studentRepository);
            $validator->isValid($regData);
            if (!isset($validator->getErrors()['regErrors'])) {
                $this->studentRepository->regToPoint($this->data['currentUser']->getId(), $request->request->all()['pointId']);
                $this->data['registeredToPoint']['success'] = "Регистрация прошла успешно";
            } else {
                $this->data['errors']['regErrors'] = $validator->getErrors()['regErrors'];
//                dd($this->data);
            }

//            $errors = $currentUser->regToPoint($_GET['eventId'], $_POST['pointId']);

        }

        if (isset($request->request->all()['unregStudFromPoint']) && isset($this->data['currentUser'])) {
            $regData = [
                'studentId' => $this->data['currentUser']->getId(),
                'pointId' => $request->request->all()['pointId'],
            ];

            $validator = new PointRegistrationValidator($this->studentRepository);
            $validator->isValid($regData);
            if (!isset($validator->getErrors()['unregErrors'])) {
                $this->studentRepository->unregFromPoint($this->data['currentUser']->getId(), $request->request->all()['pointId']);
                $this->data['registeredToPoint']['success'] = "Регистрация отменена";
            } else {
                $this->data['errors']['regErrors'] = $validator->getErrors()['unregErrors'];
            }

        }


        $eventId = $request->attributes->get('eventId');
//        dump($_SERVER['HTTP_HOST']);
//        die();
        $this->data['points'] = $this->pointRepository->findAllEventPoints($eventId);
        $this->data['host'] = $_SERVER['HTTP_HOST'];

        return new Response($this->view->render('eventPoints.twig', $this->data));
    }
}
