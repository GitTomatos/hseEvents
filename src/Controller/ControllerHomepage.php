<?php
namespace HseEvents\Controller;
use HseEvents\Model\Event;

use HseEvents\View\View;

class ControllerHomepage extends Controller
{
    public function action(): void
    {
        $events = Event::findAll();
        $data = [
            'events' => $events
        ];
        $this->view->render('layout.phtml', 'homepage.php', $data);
    }
}

