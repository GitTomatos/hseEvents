<?php
namespace HseEvents\Controller;
use HseEvents\Model\Event;
use \HseEvents\Model\ModelViewEvent;

use HseEvents\View\View;

class ControllerViewEvent extends Controller
{
    function action()
    {
//        $a = null;
//        is_null($a);

        $data = [
            'current_event' => Event::find($_GET['event_id']),
            'current_user' => null
//            'output' => null
        ];

        if (isset($_SESSION['username'])) {
            $data['current_user'] = Event::findByEmail($_SESSION['username']);
        }

        $this->view->render('layout.phtml', 'single-event.php', $data);
    }
}

?>