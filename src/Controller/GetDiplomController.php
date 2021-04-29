<?php


namespace HseEvents\Controller;


use HseEvents\Filter\SanitizingFilter;
use HseEvents\Model\Event;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\PointRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\CheckInValidator;
use HseEvents\Validation\EventValidator;
use HseEvents\Validation\GetDiplomValidator;
use HseEvents\View\TwigView;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class GetDiplomController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;
    private PointRepository $pointRepository;

    public function __construct(TwigView $view, StudentRepository $studentRepository, EventRepository $eventRepository, PointRepository $pointRepository, Session $session)
    {
        parent::__construct($view, $session);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->pointRepository = $pointRepository;
        $this->data['studentRepository'] = $studentRepository;
        $this->data['pointRepository'] = $pointRepository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
//        if (is_null($session->get('username')) || ($session->get('userPermission') !== 4)) {
//            return new RedirectResponse("/home");
//        }

        $validator = new GetDiplomValidator($this->studentRepository);
        $isValid = $validator->isValid([
            'studentId' => $request->attributes->get('studentId'),
            'eventId' => $request->attributes->get('eventId'),
        ]);

        if ($isValid) {
//            echo "YES";
//            die();
            $this->eventRepository->setDiplom(
                $request->attributes->get('studentId'),
                $request->attributes->get('eventId')
            );
        } else {
//            echo "NO";
//            die();
            $this->data['validationErrors'] = $validator->getErrors();
        }

        return new Response($this->view->render('getDiplom.twig', $this->data));
    }
}