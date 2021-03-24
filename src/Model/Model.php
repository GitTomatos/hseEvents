<?php

namespace HseEvents\Model;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use HseEvents\Registry;
use PDO;

abstract class Model
{
    abstract protected static function getTableName(): string;

    public static function find(int $id): ?Model
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName WHERE id=:id";

        $conn = Registry::get("connection")->getConnection();
        $sth = $conn->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $objData = $sth->fetch();

        if ($objData) {
            return self::createObject($objData);
        } else {
            return null;
        }
    }

    public static function findAll(): array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName";

        $conn = Registry::get("connection")->getConnection();
        $sth = $conn->prepare($sql);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $objects = [];
        while ($objectData = $sth->fetch()) {
            $object = self::createObject($objectData);
            $objects[] = $object;
        }

        return $objects;
    }

    public static function createObject(array $data): Model
    {

        return (Registry::get("createObject"))(get_called_class(), $data);
    }

    public static function findBy(array $data): array
    {


        if (count($data) === 0){
            throw new \Exception("findBy должен содержать массив ['столбец'=>'значение']
            или ['столбец'=>['значение1','значение2']]");
        }

        $tableName = static::getTableName();
        $conditionStr = '';

//        $sql = "SHOW COLUMNS FROM $tableName";
//        $sth = Connection::getInstance()->prepare($sql);
//        $sth->execute();
//        dd($sth->fetchAll());


        $counter = 0;
        foreach ($data as $columnName => $value) {
//            $value = [
//                "column1"
//            ];
            if (is_array($value)) {

//                ["id"=>[2,4,6]]
                $execData = [];
                $in = '';
                foreach ($value as $item) {
                    $key = ":val" . $counter++;
                    $in .= $key . ",";
                    $execData[$key] = $item;
                }
                $in = rtrim($in, ',');

//                $inElements = implode(', ', $value);

                $conditionStr .= " AND " . $columnName . " IN ($in)";
//                $data ["$columnName"] = $inElements;
            } else {
                $key = ":val" . $counter++;
                $execData[$key] = $value;
                $conditionStr .= " AND " . $columnName . "=" . $key;
            }
        }
        $conditionStr = mb_substr($conditionStr, 5);

        $sql = "SELECT * FROM $tableName WHERE $conditionStr";

//        echo $sql, "\n";
//        dd($execData);
//        dd($sql);

        //        $sql = "SELECT * FROM $tableName WHERE $data=:email";

        $conn = Registry::get("connection")->getConnection();
        $sth = $conn->prepare($sql);
//        $sth->bindValue(":email", $email);
//        echo $sql;
//        dd($data);
//        $execData = array_merge($data, $execData);
//        dd($execData);
        $sth->execute($execData);

//        $sth->debugDumpParams();
//    die();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $objects = [];

//        dd($sth->fetchAll());


        while ($stud = $sth->fetch()) {
             $objects[] = self::createObject($stud);
        }
        return $objects;
//        dd($stud);}

    }


//'Курс' => "1",
//"Фамилия" => "surn"

    public static function findOneBy(array $data): ?Model
    {
        $tableName = static::getTableName();
        $conditionStr = '';

//        for ($i = 0; $i < count($data); $i++){
//            if ($i != 0) {
//                $conditionStr .= " AND ";
//            }
//            $conditionStr .= $data[0] . "=:" . $data[];
//
//        }
        foreach ($data as $columnName => $value) {
            $conditionStr .= " AND " . $columnName . "=:" . $columnName;
        }
        $conditionStr = mb_substr($conditionStr, 5);

        $sql = "SELECT * FROM $tableName WHERE $conditionStr LIMIT 1";

        //        $sql = "SELECT * FROM $tableName WHERE $data=:email";

        $conn = Registry::get("connection")->getConnection();
        $sth = $conn->prepare($sql);
//        $sth->bindValue(":email", $email);
//        echo $sql;
//        dd($data);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $stud = $sth->fetch();
//        dd($stud);}
        if ($stud) {
            return self::createObject($stud);
        } else {
            return null;
        }
    }

//    public static function __callStatic($name, $arguments)
//    {
////        if (mb_substr)
//        $name(extract($arguments));
//    }
}

