<?php
namespace HseEvents\Controller;
use HseEvents\Model\{Student, Point};

class ViewEventPointsController extends Controller
{
    public function action(): void
    {
        $data = [
            'currentUser' => null,
            'points' => null
        ];

        $username = $_SESSION['username'] ?? null;
        $eventId = $_GET['eventId'];
        if (isset($username))
            $data['currentUser'] = Student::findByEmail($username);
        $data['points'] = Point::findAllEventPoints($eventId);

        $this->view->render('layout.phtml', 'eventPoints.phtml', $data);
    }
}

?>