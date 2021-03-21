<?php

namespace HseEvents\Controller;

use \HseEvents\Model\ModelRegistration;

use HseEvents\Model\Student;

class RegistrationController extends Controller
{

    public function action(): void
    {

//        $data = [
//            'errors' => [
//                'lastName' => null,
//                'firstName' => null
//            ]
//        ];

        $data = [
            'postData' => $_POST,
            'validationErrors' => []
        ];

        if (isset($_POST['addStudent'])) {
            $studentData = array();

            $studentData['lastName'] = !empty($_POST['lastName']) ? $_POST['lastName'] : null;
            $studentData['firstName'] = !empty($_POST['firstName']) ? $_POST['firstName'] : null;
            $studentData['patronymic'] = !empty($_POST['patronymic']) ? $_POST['patronymic'] : null;
            $studentData['university'] = !empty($_POST['university']) ? $_POST['university'] : null;
            $studentData['speciality'] = !empty($_POST['speciality']) ? $_POST['speciality'] : null;
            $studentData['year'] = !empty($_POST['studyYear']) ? $_POST['studyYear'] : null;
            $studentData['phone'] = !empty($_POST['phone']) ? $_POST['phone'] : null;
            $studentData['email'] = !empty($_POST['email']) ? $_POST['email'] : null;
            $studentData['password'] = !empty($_POST['pass']) ? $_POST['pass'] : null;

            $data['validationErrors'] = Student::insert($studentData);
            if (is_null($data['validationErrors'])) {
                header("Location: ./login");
            }
        }

        $this->view->render('layout.phtml', 'registration.phtml', $data);
    }
}
