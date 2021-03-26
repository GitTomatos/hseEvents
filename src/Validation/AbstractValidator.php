<?php


namespace HseEvents\Validation;


abstract class AbstractValidator
{
    protected array $errors = [];

    abstract public function isValid($data): bool;
    abstract public function getErrors(): array;
}