<?php
namespace HseEvents\Controller;
use HseEvents\Model\Event;


class HomepageController extends Controller
{
    public function action(): void
    {
//        throw new \Exception();
        $data = [
            'events' => Event::findAll()
        ];


        $this->view->render('layout.phtml', 'homepage.phtml', $data);
    }
}

