<?php


namespace HseEvents;


use HseEvents\Model\Point;
use HseEvents\Model\Student;
use HseEvents\Repository\StudentRepository;

class TwigExtension extends \Twig\Extension\AbstractExtension
{
    private array $data;

    public function __construct()
    {
//        $this->data = $data;
    }

    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('outputPointInfo', [$this, '\HseEvents\TwigExtension::outputPointInfo']),
            new \Twig\TwigFunction('outputButton', [$this, '\HseEvents\TwigExtension::outputButton']),
        ];
    }

    public function outputPointInfo(Point $point)
    {
        echo "<div class='text-center'>
                        <h1>
                            <p>ID этапа:" . $point->getId() . "</p>
                        </h1>
                        <h1>
                            <p>ID мероприятия:" . $point->getEventId() . "</p>
                        </h1>
                        <h1>
                            <p>Название:" . $point->getName() . "</p>
                        </h1>
                        <p>Описание:" . $point->getDescription() . "</p>
                    </div>";
    }


    public function outputRegisterButton(Point $point): void
    {
        if ($point->isComplex()) {
            echo "<div class='text-center'>
                    <button class='reg-button btn btn-primary btn-lg mb-5'>
                        <a href='/view-complex-event-points/" . $point->getId() . "'>
                            Зарегистрироваться
                        </a>
                    </button>
                </div>";
        } else {
            echo "<div class='text-center'>
                    <input type='hidden' name='pointId' value=" . $point->getId() . ">
                    <input type='hidden' name='pointName' value='" . $point->getName() . "'>
                    <button class='reg-button btn btn-primary btn-lg mb-5' name='regStudToPoint'>
                    Зарегистрироваться
                    </button>
                </div>";
        }
    }


    public function outputUnregisterButton(Point $point): void
    {
        echo "<div class='text-center'>
                    <input type='hidden' name='pointId' value=" . $point->getId() . ">
                    <input type='hidden' name='pointName' value='" . $point->getName() . "'>
                    <button class='reg-button btn btn-primary btn-lg mt-4 mb-5'
                        name = 'unregStudFromPoint' >
                            Отменить регистрацию
                    </button >
                </div >";
    }


    public function outputButton(
        StudentRepository $studentRepository,
        Student $currentUser,
        Point $point,
        bool $isComplex = false
    )
    {
        echo "<form action='' method='post'>";
        if (!$studentRepository->isRegedToPoint($currentUser->getId(), $point->getId())) {
            $this->outputRegisterButton($point);
        } else {
            if (!$studentRepository->isCheckedIn($currentUser->getId(), $point->getId())) {
                $link = 'https://api.qrserver.com/v1/create-qr-code/?data='
                    . 'http://' . $_SERVER['HTTP_HOST'] . '/check-in-to-point/'
                    . $currentUser->getId() . '/' . $point->getId()
                    . '&size=150x150';
                echo "<img src=" . $link . "alt='qr-code' class='img-center' >";
                $this->outputUnregisterButton($point);
            } else {

                echo "<div class='text-center'>";
                if ($point->isComplex()) {
                    echo "<button class='reg-button btn btn-success btn-lg mt-4 mb-5'>
                        <a href='/view-complex-event-points/" . $point->getId() . "'>
                            Пройдено
                        </a>
                    </button>";
                } else {
                    echo "<input type='hidden' name='pointId' value=" . $point->getId() . ">";
                    echo "<button class='reg-button btn btn-success btn-lg mt-4 mb-5'>
                        Пройдено
                    </button>";
                }
                echo "</div>";

            }

        }
        echo "</form>";
    }
}