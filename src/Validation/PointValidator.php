<?php


namespace HseEvents\Validation;


use HseEvents\Registry;
use HseEvents\Repository\PointRepository;
use PDO;

class PointValidator extends AbstractValidator
{

    private PointRepository $pointRepository;

    /**
     * PointValidator constructor.
     * @param PointRepository $pointRepository
     */
    public function __construct(PointRepository $pointRepository)
    {
        $this->pointRepository = $pointRepository;
    }


    public function isValid($data): bool
    {
        if (is_null($data['eventId'])) {
            $err = "Необходимо указать индекс мероприятия!";
            $this->addError('eventId', $err);
        }

        if (is_null($data['name'])) {
            $err = "Необходимо указать название!";
            $this->addError('name', $err);
        }

        if (!is_null($data['eventId']) && !is_null($data['name'])) {
            $event = $this->pointRepository->findBy([
                'event_id' => $data['eventId'],
                'name' => $data['name'],
            ]);

            if ($event) {
                $err = "У этого мероприятия уже есть этап с таким названием!";
                $this->addError('name', $err);
            }

        }

        if (is_null($data['description'])) {
            $err = "Необходимо указать описание!";
            $this->addError('description', $err);
        }

        if (!is_null($data['id']) && !is_int($data['id'])) {
            $err = "ID должно быть числом!";
            $this->addError('id', $err);
        }

        if (count($this->getErrors()) === 0) {
            return true;
        }
        return false;
    }
}