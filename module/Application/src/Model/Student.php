<?php

namespace Application\Model;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use Application\Registry;
use PDO, PDOException;
use ReflectionClass;

class Student implements Model
{
    private ?int $id = null;
    private string $lastName;
    private string $firstName;
    private ?string $patronymic;
    private string $university;
    private string $speciality;
    private int $year;
    private string $phone;
    private string $email;
    private string $password;
    private int $permission;


    /**
     * Student constructor.
     * @param string $lastName
     * @param string $firstName
     * @param string|null $patronymic
     * @param string $university
     * @param string $speciality
     * @param int $year
     * @param string $phone
     * @param string $email
     * @param string $password
     * @param int $permission
     */
    public function __construct(
        string $lastName,
        string $firstName,
        ?string $patronymic,
        string $university,
        string $speciality,
        int $year,
        string $phone,
        string $email,
        string $password,
        int $permission
    )
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->patronymic = $patronymic;
        $this->university = $university;
        $this->speciality = $speciality;
        $this->year = $year;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->permission = $permission;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public
    function getLastName(): string
    {
        return $this->lastName;
    }

    public
    function getFirstName(): string
    {
        return $this->firstName;
    }

    public
    function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public
    function getUniversity(): string
    {
        return $this->university;
    }

    public
    function getSpeciality(): string
    {
        return $this->speciality;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPermission(): int
    {
        return $this->permission;
    }


    public function getInfo(): array
    {
        $info = array();

        $info['id'] = $this->id;
        $info['lastName'] = $this->lastName;
        $info['firstName'] = $this->firstName;
        $info['patronymic'] = $this->patronymic;
        $info['university'] = $this->university;
        $info['speciality'] = $this->speciality;
        $info['year'] = $this->year;
        $info['phone'] = $this->phone;
        $info['email'] = $this->email;
        $info['permission'] = $this->permission;

        return $info;
    }

}
