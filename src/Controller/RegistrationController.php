<?php

namespace HseEvents\Controller;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use \HseEvents\Model\ModelRegistration;

use HseEvents\Model\Student;
use HseEvents\Registry;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\RegistrationValidator;
use HseEvents\Filter\RegistrationFilter;
use HseEvents\View\PhpView;
use Reflection;

class RegistrationController extends Controller
{

    private StudentRepository $studentRepository;

    public function __construct(PhpView $view, StudentRepository $repository)
    {
        parent::__construct($view);
        $this->studentRepository = $repository;
    }

    public function __invoke(): string
    {

        $data = [
            'postData' => $_POST,
            'validationErrors' => []
        ];

        if (isset($_POST['addStudent'])) {
            $studentData = [];

            $studentData['lastName'] = !empty($_POST['lastName']) ? $_POST['lastName'] : null;
            $studentData['firstName'] = !empty($_POST['firstName']) ? $_POST['firstName'] : null;
            $studentData['patronymic'] = !empty($_POST['patronymic']) ? $_POST['patronymic'] : null;
            $studentData['university'] = !empty($_POST['university']) ? $_POST['university'] : null;
            $studentData['speciality'] = !empty($_POST['speciality']) ? $_POST['speciality'] : null;
            $studentData['year'] = !empty($_POST['studyYear']) ? $_POST['studyYear'] : null;
            $studentData['phone'] = !empty($_POST['phone']) ? $_POST['phone'] : null;
            $studentData['email'] = !empty($_POST['email']) ? $_POST['email'] : null;
            $studentData['password'] = !empty($_POST['pass']) ? $_POST['pass'] : null;


            $studentData = (new RegistrationFilter())->filter($studentData);
            $validator = new RegistrationValidator($this->studentRepository);
            if (!$validator->isValid($studentData)) {
                $data['validationErrors'] = $validator->getErrors();
//                dd($data['validationErrors']);
            }


//            $data['validationErrors'] = Student::insert($studentData);
            if (empty($data['validationErrors'])) {
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

        return $this->view->render('registration.phtml', $data);
    }
}
