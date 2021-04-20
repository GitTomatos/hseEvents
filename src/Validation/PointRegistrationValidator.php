<?php


namespace HseEvents\Validation;


use HseEvents\Repository\StudentRepository;

class PointRegistrationValidator extends AbstractValidator
{


    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function isValid($data): bool
    {
        //regToPoint

        $isRegedToThis = $this->studentRepository->isRegedToPoint($data['studentId'], $data['pointId']);

        if ($isRegedToThis) {
            $err = "Студент уже зарегистрирован на данный этап";
            $this->addError("regErrors", $err);
        }

//        $isRegedToOthers = $this->studentRepository->isRegedToOtherPoints($data['studentId'], $data['pointId']);
//        if ($isRegedToOthers) {
//            $regedPoint = $this->studentRepository->getRegedEventPoint($data['studentId']);
//            $err = "Студент уже зарегистрирован на другой этап: " . $regedPoint->getName();
//            $this->addError("regErrors", $err);
//        }


        //unregFromPoint

        $hasRegistered = $this->studentRepository->isRegedToPoint($data['studentId'], $data['pointId']);
        if (!$hasRegistered) {
            $err = "Студент не был зарегистрирован на данный этап";
            $this->addError("unregErrors", $err);
        }


        if (count($this->getErrors()) === 0) {
            return true;
        }
        return false;
    }
}