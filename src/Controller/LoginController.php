<?php

namespace HseEvents\Controller;

use HseEvents\Model\ModelLogin;

use HseEvents\Model\Student;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\LoginValidator;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;

class LoginController extends Controller
{

    private StudentRepository $studentRepository;

    public function __construct(TwigView $view, StudentRepository $repository)
    {
        parent::__construct($view);
        $this->studentRepository = $repository;
    }

    public function __invoke(): string
    {
        $this->data = array_merge(
            $this->data,
            [
                'postData' => $_POST,
                'errors' => []
            ]
        );


        if (isset($_POST['login'])) {
            $userData = [];

            $userData['email'] = !empty($_POST['userLogin']) ? $_POST['userLogin'] : null;
            $userData['password'] = !empty($_POST['userPass']) ? $_POST['userPass'] : null;

            $validation = new LoginValidator($this->studentRepository);
            if (!$validation->isValid($userData)) {
                $this->data['errors'] = $validation->getErrors();
            }

            if (count($this->data['errors']) === 0) {
                $_SESSION['username'] = $userData['email'];
                header("Location: ./account");
            }

//            if (count($this->data['errors']) === 0) {
//                $loginResult = $this->studentRepository->login($userData['email'], md5($userData['password']));
//                if ($loginResult['hasError']) {
////                    dd($loginResult['errorMessages']);
//                    $this->data['errors'] = array_merge($this->data['errors'], $loginResult['errorMessages']);
//                } else {
//                    $_SESSION['username'] = $userData['email'];
//                    // $_SESSION['ser_info'] = $$return_data['loginResult']['info'];
//
//                    header("Location: ./account");
//                }
//            }
        }

//        dd($this->data);
        return $this->view->render('login.twig', $this->data);
    }
}

