<?php

namespace HseEvents\Controller;

//use HseEvents\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use HseEvents\Http\{Request, Response};
use Symfony\Component\HttpFoundation\Response;
use \HseEvents\Model\ModelLogout;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class LogoutController extends Controller
{
    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
        session_unset();
        return new RedirectResponse("./", 303);
//        header("Location: ./");

//        $controller = new HomepageController();
//        $controller->action();
//        header("Location: ./");
//        $this->view->render('layout.twig', 'login.twig', $data);
    }
}

?>