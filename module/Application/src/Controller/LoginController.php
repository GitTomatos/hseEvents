<?php

namespace Application\Controller;

//use HseEvents\Http\RedirectResponse;
//use HseEvents\Http\Response;
use Laminas\View\Model\ViewModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Application\Repository\StudentRepository;
use Application\Validation\LoginValidator;

use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{

    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $repository, Session $session)
    {
        parent::__construct($session);
        $this->studentRepository = $repository;
    }

    public function indexAction()
    {
        $this->data = array_merge(
            $this->data,
            [
                'postData' => $this->getRequest()->getPost()->toArray(),
                'errors' => []
            ]
        );

//        dd($this->getRequest()->getPost()->toArray());
        if (isset($this->data['postData']['login'])) {

            $loginData = [];

            $loginData['email'] = !empty($this->data['postData']['userLogin']) ? $this->data['postData']['userLogin'] : null;
            $loginData['password'] = !empty($this->data['postData']['userPass']) ? $this->data['postData']['userPass'] : null;

            $user = $this->studentRepository->findOneBy(['email'=>$loginData['email']]);

            $validation = new LoginValidator($this->studentRepository);
            if (!$validation->isValid($loginData)) {
                $this->data['errors'] = $validation->getErrors();
            }

            if (count($this->data['errors']) === 0) {
//                $_SESSION['username'] = $loginData['email'];
//                $_SESSION['userPermission'] =
                $this->session->set('username', $user->getEmail());
                $this->session->set('userPermission', $user->getPermission());

                return $this->redirect()->toRoute('account');
//                return new RedirectResponse("./account", 303);
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
        return new ViewModel($this->data);
    }
}

