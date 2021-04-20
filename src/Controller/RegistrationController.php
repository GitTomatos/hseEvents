<?php

namespace HseEvents\Controller;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use HseEvents\Http\Request;
use \HseEvents\Model\ModelRegistration;

use HseEvents\Model\Student;
use HseEvents\Registry;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\RegistrationValidator;
use HseEvents\Filter\RegistrationFilter;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;
use Reflection;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Session\Session;

//use HseEvents\Http\Response;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{

    private StudentRepository $studentRepository;

    public function __construct(TwigView $view, StudentRepository $studentRepository, Session $session)
    {
        parent::__construct($view, $session);
        $this->studentRepository = $studentRepository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
//        dump ($request->getRequest());
        $this->data = array_merge(
            $this->data,
            [
                'postData' => $request->request->all(),
                'validationErrors' => []
            ]
        );

        if (isset($this->data['postData']['addStudent'])) {
            $studentData = [];

            $studentData['lastName'] = !empty($this->data['postData']['lastName']) ? $this->data['postData']['lastName'] : null;
            $studentData['firstName'] = !empty($this->data['postData']['firstName']) ? $this->data['postData']['firstName'] : null;
            $studentData['patronymic'] = !empty($this->data['postData']['patronymic']) ? $this->data['postData']['patronymic'] : null;
            $studentData['university'] = !empty($this->data['postData']['university']) ? $this->data['postData']['university'] : null;
            $studentData['speciality'] = !empty($this->data['postData']['speciality']) ? $this->data['postData']['speciality'] : null;
            $studentData['year'] = !empty($this->data['postData']['studyYear']) ? $this->data['postData']['studyYear'] : null;
            $studentData['phone'] = !empty($this->data['postData']['phone']) ? $this->data['postData']['phone'] : null;
            $studentData['email'] = !empty($this->data['postData']['email']) ? $this->data['postData']['email'] : null;
            $studentData['password'] = !empty($this->data['postData']['pass']) ? $this->data['postData']['pass'] : null;


            $studentData = (new RegistrationFilter())->filter($studentData);
            $validator = new RegistrationValidator($this->studentRepository);
            if (!$validator->isValid($studentData)) {
                $this->data['validationErrors'] = $validator->getErrors();
//                dd($this->data['validationErrors']);
            }


//            $this->data['validationErrors'] = Student::insert($studentData);
            if (empty($this->data['validationErrors'])) {
//                $a = Registry::get("createObject");
//                dd(extract($studentData));
                $student = new Student(
                    $studentData['lastName'],
                    $studentData['firstName'],
                    $studentData['patronymic'],
                    $studentData['university'],
                    $studentData['speciality'],
                    $studentData['year'],
                    $studentData['phone'],
                    $studentData['email'],
                    $studentData['password'],
                );
//                dd($student);
//                $student = new Student(extract($studentData));
                $this->studentRepository->save($student);
                header("Location: ./login");
            }


        }


        return new Response($this->view->render('registration.twig', $this->data));
    }
}
