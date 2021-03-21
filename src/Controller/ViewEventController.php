<?php
namespace HseEvents\Controller;
use HseEvents\Model\{Event, Student};

class ViewEventController extends Controller
{
    public function action(): void
    {
//        $a = null;
//        is_null($a);

        $data = [
            'currentEvent' => Event::find($_GET['eventId']),
            'currentUser' => null
//            'output' => null
        ];

        if (isset($_SESSION['username'])) {
            $data['currentUser'] = Student::findByEmail($_SESSION['username']);
        }

        $this->view->render('layout.phtml', 'singleEvent.phtml', $data);
    }
}

?>