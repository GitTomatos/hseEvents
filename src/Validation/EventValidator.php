<?php


namespace HseEvents\Validation;


use HseEvents\Repository\EventRepository;
use PDO;

class EventValidator extends AbstractValidator
{

    private EventRepository $eventRepository;

    /**
     * EventValidator constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function isValid($data): bool
    {
        if (is_null($data['name'])) {
            $this->errors['name'][] = "Необходимо указать название!";
        } else {

            $event = $this->eventRepository->findBy(["name"=>$data['name']]);

            if ($event)
                $this->errors['name'][] = "Мероприятие с таким названием уже есть!";
        }

        if (is_null($data['description'])) {
            $this->errors['description'][] = "Необходимо указать описание!";
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