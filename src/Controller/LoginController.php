<?php

namespace HseEvents\Controller;

//use HseEvents\Http\RedirectResponse;
use HseEvents\Http\Request;
//use HseEvents\Http\Response;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use HseEvents\Model\ModelLogin;

use HseEvents\Model\Student;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\LoginValidator;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class LoginController extends Controller
{

    private StudentRepository $studentRepository;

    public function __construct(TwigView $view, StudentRepository $repository)
    {
        parent::__construct($view);
        $this->studentRepository = $repository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
        $this->data = array_merge(
            $this->data,
            [
                'postData' => $request->request->all(),
                'errors' => []
            ]
        );

//        dd($request->request->all());
        if (isset($this->data['postData']['login'])) {

            $userData = [];

            $userData['email'] = !empty($this->data['postData']['userLogin']) ? $this->data['postData']['userLogin'] : null;
            $userData['password'] = !empty($this->data['postData']['userPass']) ? $this->data['postData']['userPass'] : null;

            $validation = new LoginValidator($this->studentRepository);
            if (!$validation->isValid($userData)) {
                $this->data['errors'] = $validation->getErrors();
            }

            if (count($this->data['errors']) === 0) {
                $_SESSION['username'] = $userData['email'];
                $session->set('username', $userData['email']);
                return new RedirectResponse("./account", 303);
//                header("Location: ./account");
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
        $html = $this->view->render('login.twig', $this->data);
        return new Response($html);
    }
}

