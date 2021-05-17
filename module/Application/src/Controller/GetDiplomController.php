<?php


namespace Application\Controller;


use HseEvents\Filter\SanitizingFilter;
use Application\Model\Event;
use Application\Repository\EventRepository;
use Application\Repository\PointRepository;
use Application\Repository\StudentRepository;
use Application\Validation\CheckInValidator;
use Application\Validation\EventValidator;
use Application\Validation\GetDiplomValidator;
use HseEvents\View\TwigView;
use Laminas\View\Model\ViewModel;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class GetDiplomController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;
    private PointRepository $pointRepository;

    public function __construct(StudentRepository $studentRepository, EventRepository $eventRepository, PointRepository $pointRepository, Session $session)
    {
        parent::__construct($session);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->pointRepository = $pointRepository;
        $this->data['studentRepository'] = $studentRepository;
        $this->data['pointRepository'] = $pointRepository;
    }

    public function indexAction()
    {
//        if (is_null($session->get('username')) || ($session->get('userPermission') !== 4)) {
//            return new RedirectResponse("/home");
//        }

        $validator = new GetDiplomValidator($this->studentRepository);
        $isValid = $validator->isValid([
            'studentId' => $this->params()->fromRoute('studentId'),
            'eventId' => $this->params()->fromRoute('eventId'),
        ]);

        if ($isValid) {
//            echo "YES";
//            die();
            $this->eventRepository->setDiplom(
                $this->params()->fromRoute('studentId'),
                $this->params()->fromRoute('eventId')
            );
        } else {
//            echo "NO";
//            die();
            $this->data['validationErrors'] = $validator->getErrors();
        }

        return new ViewModel($this->data);
    }
}