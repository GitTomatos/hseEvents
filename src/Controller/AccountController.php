<?php

namespace HseEvents\Controller;

use HseEvents\Model\{Student, Event};

class AccountController extends Controller
{
    public function action(): void
    {

        $data = [
            'currentUser' => null,
            'validationErrors' => null
        ];

        $username = $_SESSION['username'] ?? null;
        if (isset($username)) {
//            $data['currentUser'] = Student::findByEmail($username);
            $data['currentUser'] = Student::findOneBy(['email'=>$username]);
        } else {
            header("Location: ./");
        }


//        if (isset($_POST['readQr'])) {
//            require_once(get_template_directory() . "/qr/qr-decoder.php");
//            $res = decodeQr();
//            echo "Результат: " . $res;
//        }


        $validationErrors = null;

        if (isset($_POST['addEvent'])) {
            $data = array();
//            filter_var($studentDataPart, FILTER_SANITIZE_SPECIAL_CHARS)
            $data['name'] = !empty($_POST['eventName']) ? $_POST['eventName'] : null;
            $data['description'] = !empty($_POST['eventDescription']) ? $_POST['eventDescription'] : null;

            $validationErrors = Event::insert($data);
            if (is_null($validationErrors))
                header("Location: ./");
        }


//        $data = $this->model->get_data($_SESSION['username']);
        $this->view->render('layout.phtml', 'account.phtml', $data);
    }
}

