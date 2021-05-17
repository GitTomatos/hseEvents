<?php


namespace Application\Controller;


use HseEvents\Filter\SanitizingFilter;
use Application\Model\Event;
use Application\Repository\EventRepository;
use Application\Repository\StudentRepository;
use Application\Validation\CheckInValidator;
use Application\Validation\EventValidator;
use HseEvents\View\TwigView;
use Laminas\View\Model\ViewModel;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CheckInController extends Controller
{

    private StudentRepository $studentRepository;

//    private array $neededPermissions =

    public function __construct(StudentRepository $studentRepository, Session $session)
    {
        parent::__construct($session);
        $this->studentRepository = $studentRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function indexAction()
    {
        if (is_null($this->session->get('username')) || ($this->session->get('userPermission') !== 4)) {
            return $this->redirect()->toRoute('home');
        }

        $validator = new CheckInValidator($this->studentRepository);
        $isValid = $validator->isValid([
            'studentId' => $this->params()->fromRoute('studentId'),
            'pointId' => $this->params()->fromRoute('pointId'),
        ]);

        if ($isValid) {
            $this->studentRepository->checkIn(
                $this->params()->fromRoute('studentId'),
                $this->params()->fromRoute('pointId')
            );
        } else {
            $this->data['validationErrors'] = $validator->getErrors();
        }

        return new ViewModel($this->data);
    }
}