<?php
namespace app\interfaces;

interface RecordInterface
{
    public static function getById(int $id): RecordInterface;

    public static function getALl();

    public static function getTableName(): string;

    public function delete();

    public function insert();

    public function update();
    
    public function save();
}