<?php

namespace Application\Controller;

use Application\Model\{Event, Student};

//use HseEvents\Http\Response;
use FastRoute\Route;
use Application\Repository\PointRepository;
use Application\Validation\ComplexPointRegistrationValidator;
use Application\Validation\PointRegistrationValidator;
use Laminas\View\Model\ViewModel;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Application\Repository\EventRepository;
use Application\Repository\StudentRepository;
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
        StudentRepository $studentRepository,
        EventRepository $eventRepository,
        PointRepository $pointRepository,
        Session $session
    )
    {
        parent::__construct($session);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->pointRepository = $pointRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function indexAction()
    {
        $this->data = array_merge(
            [
                'currentUser' => null,
                'point' => null,
                'registeredToEvent' => [],
            ],
            $this->data
        );

        $pointId = (int)$this->params()->fromRoute('pointId');
        $complexPointName = $this->params()->fromRoute('complexPointName');
        if (!is_null($complexPointName)) {
            $this->data['point'] = $this->pointRepository->findOneComplexPoint($pointId, $complexPointName);
        } else {
            $this->data['point'] = $this->pointRepository->find($pointId);
        }

        if (is_null($this->data['point'])) {
            return $this->redirect()->toRoute('home');
        } else {
            $this->data['eventId'] = $this->data['point']->getEventId();
        }

        if (isset($this->data['username'])) {
            $this->data['currentUser'] = $this->studentRepository->findOneBy(['email' => $this->data['username']]);

            if (isset($this->getRequest()->getPost()->toArray()['regStudToPoint']) && isset($this->data['currentUser'])) {
                $regData = [
                    'studentId' => $this->data['currentUser']->getId(),
                    'pointId' => $this->getRequest()->getPost()->toArray()['pointId'],
                    'pointName' => $this->getRequest()->getPost()->toArray()['pointName']
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

            if (isset($this->getRequest()->getPost()->toArray()['unregStudFromPoint']) && isset($this->data['currentUser'])) {
                $regData = [
                    'studentId' => $this->data['currentUser']->getId(),
                    'pointId' => $this->getRequest()->getPost()->toArray()['pointId'],
                    'pointName' => $this->getRequest()->getPost()->toArray()['pointName']
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
//                $this->studentRepository->unregFromPoint($this->data['currentUser']->getId(), $this->getRequest()->getPost()->toArray()['pointId']);

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
        return new ViewModel($this->data);

    }
}

