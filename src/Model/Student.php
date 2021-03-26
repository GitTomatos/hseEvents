<?php

namespace HseEvents\Model;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use HseEvents\Registry;
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
    /**
     * @var Event[]
     */
    private array $events = [];

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
     */
    public function __construct(string $lastName, string $firstName, ?string $patronymic, string $university, string $speciality, int $year, string $phone, string $email, string $password)
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
    }

    /**
     * @param Event
     */
    public function addEvent($event): void
    {
        $this->events[$event->getId()] = $event;
    }

    public function removeEvent($eventId): void
    {
        unset($this->events[$eventId]);
    }

    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    public function isRegedToEvent(int $eventId): bool
    {
        foreach ($this->events as $event) {
            if ($event->getId() === $eventId) {
                return true;
            }
        }
        return false;
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

    public
    function getYear(): int
    {
        return $this->year;
    }

    public
    function getPhone(): string
    {
        return $this->phone;
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

        return $info;
    }

}
