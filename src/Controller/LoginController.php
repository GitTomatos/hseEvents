<?php

namespace HseEvents\Controller;

use HseEvents\Model\ModelLogin;

use HseEvents\Model\Student;

class LoginController extends Controller
{
    public function action(): void
    {
        $data = [
            'postData' => $_POST,
            'errors' => []
        ];


//        $data['errors'] = array();

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
                $loginResult = Student::login($email, md5($password));
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

?>