<?php


namespace HseEvents;


use HseEvents\Model\Point;
use HseEvents\Model\Student;
use HseEvents\Repository\StudentRepository;

class TwigExtension extends \Twig\Extension\AbstractExtension
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('outputPointInfo', [$this, '\HseEvents\TwigExtension::outputPointInfo']),
            new \Twig\TwigFunction('outputPointInfo2', [$this, '\HseEvents\TwigExtension::outputPointInfo2']),
            new \Twig\TwigFunction('outputButton', [$this, '\HseEvents\TwigExtension::outputButton']),
            new \Twig\TwigFunction('outputRegisterButton', [$this, '\HseEvents\TwigExtension::outputRegisterButton']),
            new \Twig\TwigFunction('outputUnregisterButton', [$this, '\HseEvents\TwigExtension::outputUnregisterButton']),
            new \Twig\TwigFunction('outputQR', [$this, '\HseEvents\TwigExtension::outputQR']),
        ];
    }

    public function outputPointInfo(Point $point)
    {
        echo "<div class='text-center'>
                    <h1>
                        <p>" . $point->getName() . "</p>
                    </h1>
                    <p>
                        <pre>" . $point->getDescription() . "</pre>                
                    </p>
                </div>";
    }

    public function outputPointInfo2(Point $point, Student $currentUser = null, bool $addNameToHref = false)
    {
        echo "<article class='post text-center'>
                    <h2 class='entry-title'><a href='' rel='bookmark'>" . $point->getName() . "</a></h2>
                    <div class='entry-content entry-excerpt clearfix'>
                        <p>" . $point->getDescription() . "</p>";

        if ($point->isComplex()) {
            $href = '/view-complex-event-points/' . $point->getId();
        } else {
            $href = '/view-point/' . $point->getId();
        }

        if ($addNameToHref) {
            $href .= "/" . $point->getName();
        }

        if (is_null($currentUser) || !$this->studentRepository->isCheckedIn($currentUser->getId(), $point->getId())) {
            echo "<a href='$href' class='btn btn-primary'>Посмотреть</a>";
        } else {
            echo "<a href='$href' class='btn btn-success'>Посмотреть</a>";
        }

//        if ($this->studentRepository->isCheckedIn($currentUser->getId(), $point->getId())) {
//            echo "<a href='$href' class='btn btn-success'>Посмотреть</a>";
//        } else {
//            echo "<a href='$href' class='btn btn-primary'>Посмотреть</a>";
//        }
        echo "</div>";
//        $this->outputButton($point);
        echo "</article>";
    }


    public function outputRegisterButton(Point $point): void
    {
        echo "<form action='' method='post'>";

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

        echo "</form>";
    }


    public function outputUnregisterButton(Point $point): void
    {
        echo "<form action='' method='post'>";

        echo "<div class='text-center'>
                    <input type='hidden' name='pointId' value=" . $point->getId() . ">
                    <input type='hidden' name='pointName' value='" . $point->getName() . "'>
                    <button class='reg-button btn btn-primary btn-lg mt-4 mb-5'
                        name = 'unregStudFromPoint' >
                            Отменить регистрацию
                    </button >
                </div >";

        echo "</form>";
    }

    public function outputQR(Student $currentUser, Point $point): void
    {
        $link = 'https://api.qrserver.com/v1/create-qr-code/?data='
            . 'http://' . $_SERVER['HTTP_HOST'] . '/check-in-to-point/'
            . $currentUser->getId() . '/' . $point->getId()
            . '&size=150x150';
        echo "<img src=" . $link . "alt='qr-code' class='img-center' >";
    }

    public function outputQRButton(Student $currentUser, Point $point): void
    {
        $link = 'https://api.qrserver.com/v1/create-qr-code/?data='
            . 'http://' . $_SERVER['HTTP_HOST'] . '/check-in-to-point/'
            . $currentUser->getId() . '/' . $point->getId()
            . '&size=500x500';

        echo "<div class='text-center'>
                    <a class='btn btn-primary btn-lg' href='" . $link . "'>Посмотреть QR</a>
                </div >";

    }


    public function outputButton(
        Student $currentUser,
        Point $point
    )
    {
        if (!$this->studentRepository->isRegedToPoint($currentUser->getId(), $point->getId())) {
            $this->outputRegisterButton($point);
        } else {
            if (!$this->studentRepository->isCheckedIn($currentUser->getId(), $point->getId())) {
                $this->outputQRButton($currentUser, $point);
                $this->outputUnregisterButton($point);
            } else {
                echo "<form action='' method='post'>";

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
                echo "</form>";

            }

        }
    }
}