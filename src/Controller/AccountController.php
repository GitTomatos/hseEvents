<?php

namespace HseEvents\Controller;

use HseEvents\Filter\SanitizingFilter;

//use HseEvents\Http\{Request, Response};
use HseEvents\Repository\PointRepository;
use HseEvents\Validation\PointValidator;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Response;
use HseEvents\Repository\EventRepository;
use HseEvents\Repository\StudentRepository;
use HseEvents\Validation\EventValidator;
use HseEvents\View\PhpView;
use HseEvents\View\TwigView;
use HseEvents\Model\{Point, Student, Event};

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Session\Session;


class AccountController extends Controller
{

    private StudentRepository $studentRepository;
    private EventRepository $eventRepository;
    private PointRepository $pointRepository;

    public function __construct(
        TwigView $view,
        StudentRepository $studentRepository,
        EventRepository $eventRepository,
        PointRepository $pointRepository,
        Session $session
    )
    {
        parent::__construct($view, $session);
        $this->studentRepository = $studentRepository;
        $this->eventRepository = $eventRepository;
        $this->pointRepository = $pointRepository;
//        $this->data['studentRepository'] = $studentRepository;
//        $this->data['username'] = $session->get('username');
//        $this->data['userPermission'] = $session->get('userPermission');
        $this->data = array_merge(
            $this->data,
            [
                'studentRepository' => $studentRepository,
                'username' => $session->get('username'),
                'userPermission' => $session->get('userPermission'),
            ]
        );

        if ($this->data['userPermission'] === 3) {
            $this->data['events'] = $eventRepository->findAll();
            $this->data['points'] = $pointRepository->findAll();
        }
    }

    public function __invoke(SymfonyRequest $request, Session $session): Response
    {

        $this->data = array_merge(
            $this->data,
            [
                'postData' => $request->request->all(),
                'currentUser' => null,
                'validationErrors' => null,
            ]
        );
//        dd($session);
        $username = $session->get('username') ?? null;
        if (isset($username)) {
//            $this->data['currentUser'] = Student::findByEmail($username);
            $this->data['currentUser'] = $this->studentRepository->findOneBy(['email' => $username]);
        } else {
            header("Location: ./");
        }


//        if (isset($_POST['readQr'])) {
//            require_once(get_template_directory() . "/qr/qr-decoder.php");
//            $res = decodeQr();
//            echo "Результат: " . $res;
//        }


        if (isset($_POST['readQr'])) {
            $curl_file = curl_file_create($_FILES["file"]["tmp_name"], 'mimetype', 'r.png');
            $ch = curl_init('http://api.qrserver.com/v1/read-qr-code/');
            curl_setopt($ch, \CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
                'file' => $curl_file,
                'MAX_FILE_SIZE' => "1048576"
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);

            $res = json_decode($res, true)[0]['symbol'][0]['data'];
            dump($res);
        }


        if (isset($_POST['addEvent'])) {
            $eventData = array();
            $eventData['name'] = !empty($_POST['eventName']) ? $_POST['eventName'] : null;
            $eventData['description'] = !empty($_POST['eventDescription']) ? $_POST['eventDescription'] : null;

            $validator = new EventValidator($this->eventRepository);
            if ($validator->isValid($eventData)) {
                $eventData = (new SanitizingFilter())->filter($eventData);
                $event = new Event($eventData['name'], $eventData['description']);
                $this->eventRepository->save($event);
                header("Location: ./");
            } else {
                $this->data['eventValidationErrors'] = $validator->getErrors();
            }
        }

        if (isset($_POST['deleteEvent'])) {
            $eventId = $_POST['eventId'];
            $a = $this->eventRepository->findOneBy(['id' => $eventId]);
            if ($this->eventRepository->findOneBy(['id' => $eventId])) {
                $this->eventRepository->delete($eventId);
                header('Location: /account');
            }
        }

        if (isset($_POST['addPoint'])) {
            $pointData = array();
            $pointData['eventId'] = !empty($_POST['eventId']) ? $_POST['eventId'] : null;
            $pointData['name'] = !empty($_POST['pointName']) ? $_POST['pointName'] : null;
            $pointData['description'] = !empty($_POST['pointDescription']) ? $_POST['pointDescription'] : null;

            $validator = new PointValidator($this->pointRepository);
            if ($validator->isValid($pointData)) {
                $pointData = (new SanitizingFilter())->filter($pointData);
                $point = new Point($pointData['eventId'], $pointData['name'], $pointData['description']);
                $this->pointRepository->save($point);
                header("Location: ./");
            } else {
                $this->data['pointValidationErrors'] = $validator->getErrors();
            }
        }

        if (isset($_POST['deletePoint'])) {
            $pointId = $_POST['pointId'];
            $a = $this->pointRepository->findOneBy(['id' => $pointId]);
            if ($this->pointRepository->findOneBy(['id' => $pointId])) {
                $this->pointRepository->delete($pointId);
                header('Location: /account');
            }
        }

        return new Response($this->view->render('account.twig', $this->data));
    }
}

