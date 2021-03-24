<?php


namespace HseEvents\Validation;

use HseEvents\Model\Student;

class RegistrationValidator implements ValidatorInterface
{

    private array $errors = [];

    public function isValid($data): bool
    {
        if (is_null($data['lastName'])) {
            $this->errors['lastName'][] = "Необходимо указать фамилию!";
        };
        if (mb_strlen($data['lastName']) >= 30) {
            $this->errors['lastName'][] = "Фамилия должна быть не более 30 символов";
        };


        if (is_null($data['firstName'])) {
            $this->errors['firstName'][] = "Необходимо указать имя!";
        };
        if (mb_strlen($data['firstName']) >= 30) {
            $this->errors['firstName'][] = "Имя должно быть не более 30 символов";
        };


        if (is_null($data['university'])) {
            $this->errors['university'][] = "Необходимо указать университет!";
        };
        if (mb_strlen($data['university']) >= 30) {
            $this->errors['university'][] = "Должно быть не более 30 символов";
        };


        if (is_null($data['speciality'])) {
            $this->errors['speciality'][] = "Необходимо указать специальность";
        };
        if (mb_strlen($data['speciality']) >= 30) {
            $this->errors['speciality'][] = "Должно быть не более 30 символов";
        };


        if (is_null($data['year'])) {
            $this->errors['year'][] = "Необходимо указать курс";
        };
        if ($data['year'] > 5) {
            $this->errors['year'][] = "Некорректное число курса!";
        };


        if (is_null($data['phone'])) {
            $this->errors['phone'][] = "Необходимо указать телефон!";
        } else if (strlen($data['phone']) > 12 || strlen($data['phone']) < 11) {
            $this->errors['phone'][] = "Некорректный номер телефона";
        };
        if (!is_null($data['email'])) {
//            dd($data['email']);
            $student = Student::findOneBy(["phone"=>$data['phone']]);
            if (!is_null($student))
                $this->errors['phone'][] = "Такой номер уже занят!";
        }


        if (is_null($data['email'])) {
            $this->errors['email'][] = "Необходимо указать почту!";
        };
        if (mb_strlen($data['email']) > 255) {
            $this->errors['email'][] = "Должно быть не более 255 символов";
        };
        if (!is_null($data['email'])) {
//            dd($data['email']);
            $student = Student::findOneBy(["email"=>$data['email']]);
            if (!is_null($student))
                $this->errors['email'][] = "Такая почта уже занята!";
        }


        if (is_null($data['password'])) {
            $this->errors['password'][] = "Необходимо указать пароль!";
        }

        if (mb_strlen($data['password']) > 255) {
            $this->errors['password'][] = "Должно быть не более 255 символов";
        }

        if (count($this->errors) === 0) {
            return true;
        }

        return false;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}