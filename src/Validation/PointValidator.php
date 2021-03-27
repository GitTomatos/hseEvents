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
            $errors['eventId'][] = "Необходимо указать индекс мероприятия!";
        }

        if (is_null($data['name'])) {
            $errors['name'][] = "Необходимо указать название!";
        }

        if (!is_null($data['eventId']) && !is_null($data['name'])) {
            $event = $this->pointRepository->findBy([
                'event_id' => $data['eventId'],
                'name' => $data['name'],
            ]);

            if ($event)
                $errors[] = "У этого мероприятия уже есть этап с таким названием!";

        }

        if (is_null($data['description'])) {
            $errors['description'][] = "Необходимо указать описание!";
        }

        if (!is_null($data['id']) && !is_int($data['id'])) {
            $errors['id'][] = "ID должно быть числом!";
        }
    }

}