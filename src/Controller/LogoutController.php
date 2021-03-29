<?php

namespace HseEvents\Controller;

use \HseEvents\Model\ModelLogout;

class LogoutController extends Controller
{
    public function __invoke(): void
    {
        session_unset();
        header("Location: ./");

//        $controller = new HomepageController();
//        $controller->action();
//        header("Location: ./");
//        $this->view->render('layout.twig', 'login.twig', $data);
    }
}

?>