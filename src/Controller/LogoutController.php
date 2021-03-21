<?php

namespace HseEvents\Controller;

use \HseEvents\Model\ModelLogout;

class LogoutController extends Controller
{
    public function action(): void
    {
        session_unset();
        header("Location: ./");

//        $controller = new HomepageController();
//        $controller->action();
//        header("Location: ./");
//        $this->view->render('layout.phtml', 'login.phtml', $data);
    }
}

?>