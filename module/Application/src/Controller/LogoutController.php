<?php

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Symfony\Component\HttpFoundation\Session\Session;

class LogoutController extends Controller
{

    public function __construct(Session $session)
    {
        parent::__construct($session);
    }

    public function indexAction()
    {
        $a = 1;
        $this->session->clear();
//        session_unset();
        return $this->redirect()->toRoute('home');
        $a = 1;

//        return new ViewModel();

//        return new RedirectResponse("./", 303);
//        header("Location: ./");

//        $controller = new HomepageController();
//        $controller->action();
//        header("Location: ./");
//        $this->view->render('layout.twig', 'login.twig', $data);
    }
}

?>