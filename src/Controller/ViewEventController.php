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


            if (isset($_POST['regStudToEvent'])) {
                $res = $data['currentUser']->regToEvent($data['currentEvent']->getId());
                if ( $res == true )
                    echo "Регистрация прошла успешно";
                else
                    echo "Студент [id: " . $data['currentUser']->getId() . "] уже был зарегистрирован";
            }

            if (isset($_POST['unregStudFromEvent'])) {
                $res = $data['currentUser']->unregFromEvent($data['currentEvent']->getId());
                if ($res == true)
                    echo "Регистрация отменена";
                else
                    echo "Студент [id: " . $data['currentUser']->getId() . "] не был зарегистрирован";
            }


        }


        $this->view->render('layout.phtml', 'singleEvent.phtml', $data);
    }
}

?>