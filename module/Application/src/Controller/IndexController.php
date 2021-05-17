<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use PDO;
use ZendTwig\View\TwigModel;

class IndexController extends AbstractActionController
{

//    public function __construct()
//    {
//        dump($a);
//    }

    public function indexAction()
    {
//        $pdo = new PDO("mysql:host=localhost;dbname=hse_events", 'root', 'root');
//        dump($pdo);
//        echo "sdfsdfsdf";
        $a = [];
        $a[] = 1;
        return new TwigModel([$a]);
        return new ViewModel([$a]);
//        $model->setTemplate('layout.twig');
//        return $model;
    }
}
