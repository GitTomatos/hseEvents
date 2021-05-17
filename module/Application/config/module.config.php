<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application;

use Application\Controller\AccountController;
use Application\Controller\CheckInController;
use Application\Controller\GetDiplomController;
use Application\Controller\HomepageController;
use Application\Controller\IndexController;
use Application\Controller\LoginController;
use Application\Controller\LogoutController;
use Application\Controller\RegistrationController;
use Application\Controller\ViewComplexEventPointsController;
use Application\Controller\ViewEventController;
use Application\Controller\ViewEventPointsController;
use Application\Controller\ViewPointController;
use Application\Repository\EventRepository;
use Application\Repository\PointRepository;
use Application\Repository\StudentRepository;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use PDO;
use Symfony\Component\HttpFoundation\Session\Session;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/[home][/]',
                    'defaults' => [
                        'controller' => HomepageController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'login' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/login[/]',
                    'defaults' => [
                        'controller' => LoginController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'logout' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/logout',
                    'defaults' => [
                        'controller' => LogoutController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'registration' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/registration',
                    'defaults' => [
                        'controller' => RegistrationController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'account' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/account[/]',
                    'defaults' => [
                        'controller' => AccountController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'view-event' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/view-event/:eventId[/]',
                    'defaults' => [
                        'controller' => ViewEventController::class,
                        'eventId' => '[0-9]*',
                        'action' => 'index',
                    ],
                ],
            ],

            'view-event-points' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/view-event-points[/:eventId][/]',
//                    'route' => '/view-event-points',
                    'defaults' => [
                        'controller' => ViewEventPointsController::class,
                        'eventId' => '[0-9]*',
                        'action' => 'index',
                    ],
                ],
            ],
            'view-point' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/view-point/:pointId[/:complexPointName]',
                    'defaults' => [
                        'controller' => ViewPointController::class,
                        'pointId' => '[0-9]*',
                        'action' => 'index',
                    ],
                ],
            ],
            'view-complex-point' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/view-complex-event-points/:pointId[/]',
                    'defaults' => [
                        'controller' => ViewComplexEventPointsController::class,
                        'pointId' => '[0-9]*',
                        'action' => 'index',
                    ],
                ],
            ],
            'check-in' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/check-in-to-point/:studentId/:pointId[/]',
                    'defaults' => [
                        'controller' => CheckInController::class,
                        'studentId' => '[0-9]*',
                        'pointId' => '[0-9]*',
                        'action' => 'index',
                    ],
                ],
            ],
            'get-diplom' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/get-diplom/:studentId/:eventId[/]',
                    'defaults' => [
                        'controller' => GetDiplomController::class,
                        'studentId' => '[0-9]*',
                        'eventId' => '[0-9]*',
                        'action' => 'index',
                    ],
                ],
            ],
//            '' => [
//            'type' => Literal::class,
//            'options' => [
//                'route' => '/',
//                'defaults' => [
//                    'controller' => ::class,
//                        'action' => 'index',
//                    ],
//                ],
//            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
//            Controller\IndexController::class => InvokableFactory::class,
            IndexController::class => function ($sm) {
                return new IndexController();
            },
            HomepageController::class => function ($sm) {
                return new HomepageController(
                    $sm->getServiceLocator()->get(EventRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },
            AccountController::class => function ($sm) {
                return new AccountController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(EventRepository::class),
                    $sm->getServiceLocator()->get(PointRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            CheckInController::class => function ($sm) {
                return new CheckInController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            GetDiplomController::class => function ($sm) {
                return new GetDiplomController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(EventRepository::class),
                    $sm->getServiceLocator()->get(PointRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            LoginController::class => function ($sm) {
                return new LoginController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            LogoutController::class => function ($sm) {
                return new LogoutController(
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            RegistrationController::class => function ($sm) {
                return new RegistrationController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            ViewEventController::class => function ($sm) {
                return new ViewEventController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(EventRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            ViewPointController::class => function ($sm) {
                return new ViewPointController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(EventRepository::class),
                    $sm->getServiceLocator()->get(PointRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            ViewEventPointsController::class => function ($sm) {
                return new ViewEventPointsController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(PointRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },

            ViewComplexEventPointsController::class => function ($sm) {
                return new ViewComplexEventPointsController(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                    $sm->getServiceLocator()->get(PointRepository::class),
                    $sm->getServiceLocator()->get(Session::class)
                );
            },
            TwigExtension::class => function ($sm) {
                return new TwigExtension(
                    $sm->getServiceLocator()->get(StudentRepository::class),
                );
            },
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.twig',
            'application/index/index' => __DIR__ . '/../view/application/index/index.twig',
            'error/404' => __DIR__ . '/../view/error/404.twig',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
//        'strategies' => array(
//            'ZfcTwigViewStrategy',
//        ),
    ],
    'service_manager' => [
        'factories' => [
            'test' => function ($sm) {
                return 'qwerty';
            },
            Session::class => function ($sm) {
                return new Session();
            },
            PDO::class => function ($sm) {
                $pdo = new PDO("mysql:host=localhost;dbname=hse_events", 'root', 'root');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            },
            EventRepository::class => function ($sm) {
                return new EventRepository(
                    $sm->getServiceLocator()->get(PDO::class),
                    $sm->getServiceLocator()->get(PointRepository::class)
                );
            },
            StudentRepository::class => function ($sm) {
                return new StudentRepository(
                    $sm->get(PDO::class),
                    $sm->get(EventRepository::class),
                    $sm->get(PointRepository::class)
                );
            },
            PointRepository::class => function ($sm) {
                return new PointRepository($sm->get(PDO::class));
            },
        ],
    ],

    'zfctwig' => [
        'extensions' => [
            TwigExtension::class,
        ],
        'environment_options' => [
            'cache' => './data/twig/cache',
            'debug' => true
        ],

    ],
];
