<?php

namespace Application\Controller;

use Laminas\View\Model\ViewModel;
use Symfony\Component\HttpFoundation\Response;
use Application\Repository\PointRepository;
use Application\Repository\StudentRepository;
use Application\Validation\{PointRegistrationValidator, ComplexPointRegistrationValidator};
use HseEvents\View\TwigView;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class ViewComplexEventPointsController extends Controller
{

    private StudentRepository $studentRepository;
    private PointRepository $pointRepository;

    public function __construct(StudentRepository $studentRepository, PointRepository $pointRepository, Session $session)
    {
        parent::__construct($session);
        $this->studentRepository = $studentRepository;
        $this->pointRepository = $pointRepository;
        $this->data['studentRepository'] = $studentRepository;
        $this->data['pointRepository'] = $pointRepository;
    }

    public function indexAction()
    {

        $this->data = array_merge(
            $this->data,
            [
                'pointId' => $this->params()->fromRoute('pointId'),
                'currentUser' => null,
                'points' => null,
                'errors' => [],
            ]
        );

        $username = $this->session->get('username') ?? null;
        if (isset($username)) {
            $this->data['currentUser'] = $this->studentRepository->findOneBy(["email" => $username]);
        }


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
                $this->data['registeredToPoint']['success'] = "?????????????????????? ???????????? ??????????????";
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

                $this->data['registeredToPoint']['success'] = "?????????????????????? ????????????????";
            } else {
                $this->data['errors']['regErrors'] = $validator->getErrors()['unregErrors'];
            }

        }


//        dump($_SERVER['HTTP_HOST']);
//        die();
        $this->data['points'] = $this->pointRepository->findComplexPoints($this->data['pointId']);
        $this->data['host'] = $_SERVER['HTTP_HOST'];

        return new ViewModel($this->data);
    }
}
