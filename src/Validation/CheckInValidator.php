<?php


namespace HseEvents\Validation;


use HseEvents\Repository\StudentRepository;

class CheckInValidator extends AbstractValidator
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function isValid($data): bool
    {
//        die("hello");
        $isReged = $this->studentRepository->isRegedToPoint($data['studentId'], $data['pointId']);
//        dump($isReged);
//        die();
        if (!$isReged) {
            $err = "Не зарегистрирован на такое мероприятие!";
            $this->addError('notRegistered', $err);
        }

        if (count($this->getErrors()) === 0) {
            return true;
        }

        return false;
    }

}