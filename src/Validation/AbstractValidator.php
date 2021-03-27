<?php


namespace HseEvents\Validation;


abstract class AbstractValidator implements ValidatorInterface
{
    private array $errors = [];

    protected function addError(string $field, string $error): void {
        $this->errors[$field][] = $error;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}