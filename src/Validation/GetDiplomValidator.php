<?php


namespace HseEvents\Validation;


use HseEvents\Repository\StudentRepository;

class GetDiplomValidator extends AbstractValidator
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function isValid($data): bool
    {
//        die("hello");
        $unmarkedPoints = $this->studentRepository->getUnmarkedEventPoints($data['studentId']);

        if (count($unmarkedPoints) === 0) {
            $isFullyPassed = true;
        } else {
            $isFullyPassed = false;
        }
//        foreach ($regedPoints as $point) {
//            $a = $point->getEventId();
//            $b = $data['eventId'];
//            if ($point->getEventId() == $data['eventId']) {
//                if (!$point->hasMarked()) {
//                    $isFullyPassed = false;
//                    break;
//                }
//            }
//        }
//        dump($isReged);
//        die();
        if (!$isFullyPassed) {
            foreach ($unmarkedPoints as $point) {
//                $err = "Мероприятие пройдено не полностью!";
                $err = $point->getId();
                $this->addError('notFullyPassed', $err);
            }

        }

        if (count($this->getErrors()) === 0) {
            return true;
        }

        return false;
    }

}