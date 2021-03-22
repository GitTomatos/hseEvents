<?php

use \HseEvents\Database\Connection;

session_start();

include '../config/config.php';
include '../bootstrap.php';



$controllerName = '';
$path = '';
if (isset($_SERVER['PATH_INFO'])) {
    $lastSymbol = substr($_SERVER['PATH_INFO'], -1);
    if ($lastSymbol === "/") {
        $path = substr($_SERVER['PATH_INFO'], 0, -1);
    } else {
        $path = $_SERVER['PATH_INFO'];
    }
}

$a = $_SESSION['username'] ?? null;


/*
 * / - HomepageController
 * /home - HomepageController
 * /account - ControllerAccount
 * /login - LoginController
 * /logout - LogoutController
 * /registration - RegistrationController
 * /view-event - ViewEventController
 * /view-event-point - ControllerViewEventPoint
 * /give-error - ControllerGiveError
*/


switch ($path) {
    case '/home':
        $controllerName = 'HseEvents\Controller\HomepageController';
        break;
    case '/account':
        $controllerName = 'HseEvents\Controller\AccountController';
        break;
    case '/login':
        $controllerName = 'HseEvents\Controller\LoginController';
        break;
    case '/logout':
        $controllerName = 'HseEvents\Controller\LogoutController';
        break;
    case '/registration':
        $controllerName = 'HseEvents\Controller\RegistrationController';
        break;
    case '/view-event':
        $controllerName = 'HseEvents\Controller\ViewEventController';
        break;
    case '/view-event-points':
        $controllerName = 'HseEvents\Controller\ViewEventPointsController';
        break;
    case '/give-error':
        $controllerName = 'HseEvents\Controller\ControllerGiveError';
        break;
    default:
//        '/home';
        $controllerName = 'HseEvents\Controller\HomepageController';
}

try {
//    $conn = new Connection();
//    Connection::connectDb();

    Connection::getInstance()->beginTransaction();

    $controller = new $controllerName;
    $controller->action();

    if (Connection::getInstance()->inTransaction()) {
        Connection::getInstance()->commit();
    }
} catch (Throwable $e) {
    if (Connection::getInstance()->inTransaction()) {
        Connection::getInstance()->rollBack();
    }
    throw $e;
} finally {
    $conn = Connection::getInstance();
    $conn = null;
}


//require_once '../src/config/config.php';
//require_once '../vendor/autoload.php';
//
//session_start();
//
//$action = $_GET['action'] ?? null;
//
//if (isset($_SESSION['username']))
//    $current_user = Student::find_by_email($_SESSION['username']);
//else
//    $current_user = null;
//
//
//switch ($action) {
//    case 'view_event':
//    {
//        view_event();
//        break;
//    }
//    case 'view_event_points':
//    {
//        view_event_points();
//        break;
//    }
//    case 'registration':
//    {
//        registration();
//        break;
//    }
//    case 'account':
//    {
//        account();
//        break;
//    }
//    case 'login':
//    {
//        login();
//        break;
//    }
//    case 'logout':
//    {
//        logout();
//        break;
//    }
//    case 'give_error':
//    {
//        give_error();
//        break;
//    }
//    default:
//    {
//        homepage();
//        break;
//    }
//}
//
//function homepage()
//{
////    $events = Event::get_all_events();
////    require_once(TEMPLATE_PATH . "/homepage.phtml");
//}
//
//function view_event()
//{
////    global $current_user;
////
////    $current_event = Event::get_by_id($_GET['event_id']);
////
////
////    if (isset($_POST['reg_stud_to_event'])) {
////        $res = $current_user->reg_to_event($current_event->get_id());
////        if ($res == true)
////            echo "Регистрация прошла успешно";
////        else
////            echo "Студент [id: " . $current_user->get_id() . "] уже был зарегистрирован";
////    }
////
////    if (isset($_POST['unreg_stud_from_event'])) {
////        $res = $current_user->unreg_from_event($current_event->get_id());
////        if ($res == true)
////            echo "Регистрация отменена";
////        else
////            echo "Студент [id: " . $current_user->get_id() . "] не был зарегистрирован";
////    }
////
////
////    require_once(TEMPLATE_PATH . "/singleEvent.phtml");
//}
//
//
//function view_event_points()
//{
////    global $current_user;
////
////    $points = Point::get_all_event_points($_GET['event_id']);
////    require_once(TEMPLATE_PATH . "/eventPoints.phtml");
//}
//
//function registration()
//{
////    $validation_errors = null;
//
////    if (isset($_POST['add_student'])) {
////        global $validation_errors;
////
////        $data = array();
////
////        $data['last_name'] = !empty($_POST['last_name']) ? $_POST['last_name'] : null;
////        $data['first_name'] = !empty($_POST['first_name']) ? $_POST['first_name'] : null;
////        $data['patronymic'] = !empty($_POST['patronymic']) ? $_POST['patronymic'] : null;
////        $data['university'] = !empty($_POST['university']) ? $_POST['university'] : null;
////        $data['speciality'] = !empty($_POST['speciality']) ? $_POST['speciality'] : null;
////        $data['year'] = !empty($_POST['study_year']) ? $_POST['study_year'] : null;
////        $data['phone'] = !empty($_POST['phone']) ? $_POST['phone'] : null;
////        $data['email'] = !empty($_POST['email']) ? $_POST['email'] : null;
////        $data['password'] = !empty($_POST['pass']) ? $_POST['pass'] : null;
////
////        $new_student = new Student($data);
////
////        $validation_errors = $new_student->insert();
////        if (is_null($validation_errors)) {
////            header("Location: ./?action=login");
////        }
////    }
//
////    require_once(TEMPLATE_PATH . "/registration.phtml");
//}
//
//function account()
//{
////    global $current_user;
////
////    if (!isset($_SESSION['username']))
////        header("Location: ./?action=give_error");
//
//    // $current_user = Student::find_by_email( $_SESSION['username'] );
//
////    require_once(TEMPLATE_PATH . "/account.phtml");
//}
//
//function login()
//{
////    $errors = array();
////
////    if (isset($_POST['login'])) {
////        $data = array();
////
////        $email = !empty($_POST['user_login']) ? $_POST['user_login'] : null;
////        $password = !empty($_POST['user_pass']) ? $_POST['user_pass'] : null;
////
////        if (is_null($email)) {
////            $errors[] = "Необходимо ввести логин";
////        }
////
////        if (is_null($password)) {
////            $errors[] = "Необходимо ввести пароль";
////        }
////
////        if (empty ($errors)) {
////            $login_result = Student::login($email, $password);
////            if ($login_result['has_error'])
////                $errors = array_merge($errors, $login_result['error_messages']);
////            else {
////                $_SESSION['username'] = $email;
////                // $_SESSION['user_info'] = $login_result['info'];
////
////                header("Location: ./?action=account");
////            }
////        }
////    }
//
////    require_once(TEMPLATE_PATH . "/login.phtml");
//}
//
//function logout()
//{
//    session_unset();
//    header("Location: ./");
//}
//
//
//function give_error()
//{
//    require_once(TEMPLATE_PATH . "/emptyPage.php");
//}
//
//
//?>