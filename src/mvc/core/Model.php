<?php

namespace MVC\Core;

abstract class Model
{
    /**
     * Получает запись из БД
     */
    public abstract function selectById(int $id);

    public abstract function insert();

    public abstract function update();

    public abstract function delete();
}