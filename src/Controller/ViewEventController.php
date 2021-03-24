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
            'currentUser' => null,
            'registeredToEvent' => []
//            'output' => null
        ];

        if (isset($_SESSION['username'])) {
            $data['currentUser'] = Student::findOneBy(['email'=>$_SESSION['username']]);


            if (isset($_POST['regStudToEvent'])) {
                $res = $data['currentUser']->regToEvent($data['currentEvent']->getId());
                if ( $res == true )
                    $data['registeredToEvent']['success'] = "Регистрация прошла успешно";
                else
                    $data['registeredToEvent']['unsuccess'] = "Студент [id: " . $data['currentUser']->getId() . "] уже был зарегистрирован";
            }

            if (isset($_POST['unregStudFromEvent'])) {
                $res = $data['currentUser']->unregFromEvent($data['currentEvent']->getId());
                if ($res == true)
                    $data['registeredToEvent']['success'] = "Регистрация отменена";
                else
                    $data['registeredToEvent']['unsuccess'] = "Студент [id: " . $data['currentUser']->getId() . "] не был зарегистрирован";
            }


        }


        $this->view->render('layout.phtml', 'singleEvent.phtml', $data);
    }
}

?>