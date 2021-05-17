<?php


namespace Application;


use ReflectionClass;

class CreateObject
{

    public function __invoke(string $className, array $data): object
    {
        $reflection = new ReflectionClass($className);
        $object = $reflection->newInstanceWithoutConstructor();

        foreach ($data as $propName => $propValue) {
            $propName = Utils::underscore2camel($propName);
            if (!$reflection->hasProperty($propName)) {
                continue;
            }

            $property = $reflection->getProperty($propName);
            $property->setAccessible(true);
            $property->setValue($object, $propValue);
        }

        return $object;
    }
}