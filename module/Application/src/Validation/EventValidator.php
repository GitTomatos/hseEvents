<?php


namespace Application\Validation;


use Application\Repository\EventRepository;

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
            $this->addError('name', "Необходимо указать название!");
        } else {

            $event = $this->eventRepository->findBy(["name"=>$data['name']]);

            if ($event) {
                $this->addError('name', "Мероприятие с таким названием уже есть!");
            }
        }

        if (is_null($data['description'])) {
            $this->addError('description', "Необходимо указать описание!");
        }

        if (count($this->getErrors()) === 0) {
            return true;
        }
        return false;
    }
}