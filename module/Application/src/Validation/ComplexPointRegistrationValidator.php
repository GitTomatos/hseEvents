<?php


namespace Application\Validation;



use Application\Repository\StudentRepository;

class ComplexPointRegistrationValidator extends AbstractValidator
{


    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function isValid($data): bool
    {
        //regToPoint

        $isRegedToThis = $this->studentRepository->isRegedToComplexPoint(
            $data['studentId'],
            $data['pointId'],
        );

        if ($isRegedToThis) {
            $err = "Студент уже зарегистрирован на данный ПОДэтап";
            $this->addError("regErrors", $err);
        }


        $hasRegistered = $this->studentRepository->isRegedToPoint($data['studentId'], $data['pointId']);
        if (!$hasRegistered) {
            $err = "Студент не был зарегистрирован на данный ПОДэтап";
            $this->addError("unregErrors", $err);
        }


        if (count($this->getErrors()) === 0) {
            return true;
        }
        return false;
    }
}