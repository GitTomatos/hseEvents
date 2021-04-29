<?php

namespace HseEvents\Controller;

use HseEvents\Model\{Event, Student};

//use HseEvents\Http\Response;
use FastRoute\Route;
use HseEvents\Repository\PointRepository;
use HseEvents\Validation\ComplexPointRegistrationValidator;
use HseEvents\Validation\PointRegistrationValidator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class ViewPointController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;
    private PointRepository $pointRepository;

    public function __construct(
        TwigView $view,
        StudentRepository $studentRepository,
        EventRepository $eventRepository,
        PointRepository $pointRepository,
        Session $session
    )
    {
        parent::__construct($view, $session);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->pointRepository = $pointRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
        $this->data = array_merge(
            [
                'currentUser' => null,
                'point' => null,
                'registeredToEvent' => [],
            ],
            $this->data
        );

        $pointId = $request->attributes->get('pointId');
        $complexPointName = $request->attributes->get('complexPointName');
        if (!is_null($complexPointName)) {
            $this->data['point'] = $this->pointRepository->findOneComplexPoint($pointId, $complexPointName);
        } else {
            $this->data['point'] = $this->pointRepository->find($pointId);
        }

        if (is_null($this->data['point'])) {
            return new RedirectResponse("/home");
        } else {
            $this->data['eventId'] = $this->data['point']->getEventId();
        }

        if (isset($this->data['username'])) {
            $this->data['currentUser'] = $this->studentRepository->findOneBy(['email' => $this->data['username']]);

            if (isset($request->request->all()['regStudToPoint']) && isset($this->data['currentUser'])) {
                $regData = [
                    'studentId' => $this->data['currentUser']->getId(),
                    'pointId' => $request->request->all()['pointId'],
                    'pointName' => $request->request->all()['pointName']
                ];

                $point = $this->pointRepository->find($regData['pointId']);

                if ($point->isComplex()) {
                    $validator = new ComplexPointRegistrationValidator($this->studentRepository);
                    $validator->isValid($regData);
                } else {
                    $validator = new PointRegistrationValidator($this->studentRepository);
                    $validator->isValid($regData);
                }


                if (!isset($validator->getErrors()['regErrors'])) {
                    if ($point->isComplex()) {
                        $this->studentRepository->regToComplexPoint(
                            $regData['studentId'],
                            $regData['pointId'],
                            $regData['pointName'],
                        );
                    } else {
                        $this->studentRepository->regToPoint(
                            $regData['studentId'],
                            $regData['pointId'],
                        );
                    }
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
                    'pointName' => $request->request->all()['pointName']
                ];

                $point = $this->pointRepository->find($regData['pointId']);

                if ($point->isComplex()) {
                    $validator = new ComplexPointRegistrationValidator($this->studentRepository);
                    $validator->isValid($regData);
                } else {
                    $validator = new PointRegistrationValidator($this->studentRepository);
                    $validator->isValid($regData);
                }

                $validator->isValid($regData);
                if (!isset($validator->getErrors()['unregErrors'])) {
//                $this->studentRepository->unregFromPoint($this->data['currentUser']->getId(), $request->request->all()['pointId']);

                    if ($point->isComplex()) {
                        $this->studentRepository->unregFromComplexPoint(
                            $regData['studentId'],
                            $regData['pointId'],
                        );
                    } else {
                        $this->studentRepository->unregFromPoint(
                            $regData['studentId'],
                            $regData['pointId'],
                        );
                    }

                    $this->data['registeredToPoint']['success'] = "Регистрация отменена";
                } else {
                    $this->data['errors']['regErrors'] = $validator->getErrors()['unregErrors'];
                }

            }


        }
//        dd($this->data);
        return new Response($this->view->render('singlePoint.twig', $this->data));
    }
}

