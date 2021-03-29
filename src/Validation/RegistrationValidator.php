<?php


namespace HseEvents\Validation;

use HseEvents\Model\Student;
use HseEvents\Repository\StudentRepository;

class RegistrationValidator extends AbstractValidator
{

    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function isValid($data): bool
    {
        if (is_null($data['lastName'])) {
            $err = "Необходимо указать фамилию!";
            $this->addError('lastName', $err);
        };
        if (mb_strlen($data['lastName']) >= 30) {
            $err = "Фамилия должна быть не более 30 символов";
            $this->addError('lastName', $err);
        };


        if (is_null($data['firstName'])) {
            $err = "Необходимо указать имя!";
            $this->addError('firstName', $err);
        };
        if (mb_strlen($data['firstName']) >= 30) {
            $err = "Имя должно быть не более 30 символов";
            $this->addError('firstName', $err);
        };


        if (is_null($data['university'])) {
            $err = "Необходимо указать университет!";
            $this->addError('university', $err);
        };
        if (mb_strlen($data['university']) >= 30) {
            $err = "Должно быть не более 30 символов";
            $this->addError('university', $err);
        };


        if (is_null($data['speciality'])) {
            $err = "Необходимо указать специальность";
            $this->addError('speciality', $err);
        };
        if (mb_strlen($data['speciality']) >= 30) {
            $err = "Должно быть не более 30 символов";
            $this->addError('speciality', $err);
        };


        if (is_null($data['year'])) {
            $err = "Необходимо указать курс";
            $this->addError('year', $err);
        };
        if ($data['year'] > 5) {
            $err = "Некорректное число курса!";
            $this->addError('year', $err);
        };


        if (is_null($data['phone'])) {
            $err = "Необходимо указать телефон!";
            $this->addError('phone', $err);
        } else if (strlen($data['phone']) !== 11) {
            $err = "Телефон должен содержать 11 цифр";
            $this->addError('phone', $err);
        };

        if (!is_null($data['email'])) {
//            dd($data['email']);
            $student = $this->studentRepository->findOneBy(["phone"=>$data['phone']]);

            if (!is_null($student)) {
                $err = "Такой номер уже занят!";
                $this->addError('phone', $err);
            }
        }


        if (is_null($data['email'])) {
            $err = "Необходимо указать почту!";
            $this->addError('email', $err);
        }

        if (mb_strlen($data['email']) > 255) {
            $err = "Должно быть не более 255 символов";
            $this->addError('email', $err);
        };
        if (!is_null($data['email'])) {
//            dd($data['email']);
            $student = $this->studentRepository->findOneBy(["email"=>$data['email']]);
            if (!is_null($student)) {
                $err = "Такая почта уже занята!";
                $this->addError('email', $err);
            }
        }


        if (is_null($data['password'])) {
            $err = "Необходимо указать пароль!";
            $this->addError('password', $err);
        }

        if (mb_strlen($data['password']) > 255) {
            $err = "Должно быть не более 255 символов";
            $this->addError('password', $err);
        }

        if (count($this->getErrors()) === 0) {
            return true;
        }

        return false;
    }

}