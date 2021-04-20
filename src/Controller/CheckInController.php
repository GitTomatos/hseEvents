<?php


namespace HseEvents\Controller;


use HseEvents\Filter\SanitizingFilter;
use HseEvents\Model\Event;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\CheckInValidator;
use HseEvents\Validation\EventValidator;
use HseEvents\View\TwigView;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CheckInController extends Controller
{

    private StudentRepository $studentRepository;
//    private array $neededPermissions =

    public function __construct(TwigView $view, StudentRepository $studentRepository, Session $session)
    {
        parent::__construct($view, $session);
        $this->studentRepository = $studentRepository;
        $this->data['studentRepository'] = $studentRepository;
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {
        if (is_null($session->get('username')) || ($session->get('userPermission') !== 4)) {
            return new RedirectResponse("/home");
        }

        $validator = new CheckInValidator($this->studentRepository);
        $isValid = $validator->isValid([
            'studentId' => $request->attributes->get('studentId'),
            'pointId' => $request->attributes->get('pointId'),
        ]);

        if ($isValid) {
            $this->studentRepository->checkIn(
                $request->attributes->get('studentId'),
                $request->attributes->get('pointId')
            );
        } else {
            $this->data['validationErrors'] = $validator->getErrors();
        }

        return new Response($this->view->render('checkIn.twig', $this->data));
    }
}