<?php


namespace HseEvents\Repository;


use HseEvents\CreateObject;
use HseEvents\Model\Model;
use PDO;

abstract class AbstractRepository implements RepositoryInterface
{

    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(Model $model): void
    {
        if (is_null($model->getId())) {
            $this->insert($model);
        } else {
            $this->update($model);
        }
    }

    public function delete(int $id): void {
        $tableName = $this->getTableName();
        $conn = $this->pdo;

        $sql = "DELETE FROM $tableName WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
    }

    public function find(int $id): ?Model
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName WHERE id=:id";

        $conn = $this->pdo;
        $sth = $conn->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $objData = $sth->fetch();

        if ($objData) {
            $object = $this->createObject($objData);
//            $object = $this->addExtraData($object);
            return $object;
        } else {
            return null;
        }
    }

    /**
     * @param array $objData
     * @return Model|object
     */
    protected function createObject(array $objData): Model {
        return (new CreateObject())($this->getModelClassname(), $objData);
    }


    public function findAll(): array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName";

        $conn = $this->pdo;
        $sth = $conn->prepare($sql);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $objects = [];
        while ($objectData = $sth->fetch()) {
            $object = $this->createObject($objectData);
            $objects[] = $object;
        }

        return $objects;
    }

    public function findBy(array $data): array
    {
        if (count($data) === 0) {
            throw new \Exception("findBy должен содержать массив 
            ['столбец1'=>'значение1', 'столбец2'=>'значение2']
            или
            ['столбец'=>['значение1','значение2']]");
        }

        $tableName = static::getTableName();
        $conditionStr = '';

        $counter = 0;
        foreach ($data as $columnName => $value) {
            if (is_array($value)) {

                $execData = [];
                $in = '';
                foreach ($value as $item) {
                    $key = ":val" . $counter++;
                    $in .= $key . ",";
                    $execData[$key] = $item;
                }
                $in = rtrim($in, ',');

                $conditionStr .= " AND " . $columnName . " IN ($in)";
            } else {
                $key = ":val" . $counter++;
                $execData[$key] = $value;
                $conditionStr .= " AND " . $columnName . "=" . $key;
            }
        }
        $conditionStr = mb_substr($conditionStr, 5);

        $sql = "SELECT * FROM $tableName WHERE $conditionStr";

        $conn = $this->pdo;
        $sth = $conn->prepare($sql);
        $sth->execute($execData);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $objects = [];

        while ($stud = $sth->fetch()) {
            $object = $this->createObject($stud);
            $objects[] = $object;
        }
        return $objects;
    }

    public function findOneBy(array $data): ?Model
    {
        $tableName = static::getTableName();
        $conditionStr = '';

        foreach ($data as $columnName => $value) {
            $conditionStr .= " AND " . $columnName . "=:" . $columnName;
        }
        $conditionStr = mb_substr($conditionStr, 5);

        $sql = "SELECT * FROM $tableName WHERE $conditionStr LIMIT 1";


        $conn = $this->pdo;
        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $stud = $sth->fetch();
        if ($stud) {
            return $this->createObject($stud);
        } else {
            return null;
        }
    }

//    abstract public function addExtraData(Model $model): Model;
    abstract public function getTableName(): string;

    protected function update(Model $model)
    {
        //TODO update()
    }


}