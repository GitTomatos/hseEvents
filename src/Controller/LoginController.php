<?php

namespace HseEvents\Controller;

use HseEvents\Model\ModelLogin;

use HseEvents\Model\Student;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\View\View;

class LoginController extends Controller
{

    private StudentRepository $repository;

    public function __construct(View $view, StudentRepository $repository)
    {
        parent::__construct($view);
        $this->repository = $repository;
    }

    public function __invoke(): void
    {
        $data = [
            'postData' => $_POST,
            'errors' => []
        ];


        if (isset($_POST['login'])) {

            $email = !empty($_POST['userLogin']) ? $_POST['userLogin'] : null;
            $password = !empty($_POST['userPass']) ? $_POST['userPass'] : null;

            if (is_null($email)) {
                $data['errors'][] = "Необходимо ввести логин";
            }

            if (is_null($password)) {
                $data['errors'][] = "Необходимо ввести пароль";
            }

            if (empty ($data['errors'])) {
                $loginResult = $this->repository->login($email, md5($password));
                if ($loginResult['hasError']) {
//                    dd($loginResult['errorMessages']);
                    $data['errors'] = array_merge($data['errors'], $loginResult['errorMessages']);
                } else {
                    $_SESSION['username'] = $email;
                    // $_SESSION['ser_info'] = $$return_data['loginResult']['info'];

                    header("Location: ./account");
                }
            }
        }

//        dd($data);
        $this->view->render('layout.phtml', 'login.phtml', $data);
    }
}

