<?php


namespace Application\Validation;


interface ValidatorInterface
{
    public function isValid($data): bool;
    public function getErrors(): array;
}