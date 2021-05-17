<?php


namespace Application\Repository;

use Application\Model\Model;


interface RepositoryInterface
{
    public function save(Model $model): void;
    public function getModelClassname(): string;
    public function find(int $id): ?Model;
    public function findAll(): array;
    public function findBy(array $data): array;
    public function findOneBy(array $data): ?Model;
    public function getTableName(): string;
}