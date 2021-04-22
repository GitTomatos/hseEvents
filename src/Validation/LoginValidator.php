<?php


namespace HseEvents\Validation;


use HseEvents\Repository\StudentRepository;

class LoginValidator extends AbstractValidator
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function isValid($data): bool
    {
        if (is_null($data['email'])) {
            $err = "Необходимо ввести логин";
            $this->addError('login', $err);
        }

        if (is_null($data['password'])) {
            $err = "Необходимо ввести пароль";
            $this->addError('password', $err);
        }

        if (count($this->getErrors()) === 0) {
            $stud = $this->studentRepository->findOneBy(["email" => $data['email']]);
            if (is_null($stud)) {
                $err = "Студент с такой почтой не найден";
                $this->addError('login', $err);
            } else {
                $isPassCorrect = $this->studentRepository->checkPassword($stud, $data['password']);

                if (!$isPassCorrect) {
                    $err = "Неправильный пароль";
                    $this->addError('password', $err);
                }
            }
        }

        if (count($this->getErrors()) === 0){
            return true;
        }
        return false;
    }
}