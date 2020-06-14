<?php
namespace app\interfaces;

interface ModelInterface
{
    public function getById(int $id): ModelInterface;

    public function getALl();

    public function getTableName(): string;

}