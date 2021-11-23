<?php

namespace MVC\Core;

abstract class Model
{
    public abstract function selectById(int $id);

    public abstract function insert();

    public abstract function update();

    public abstract function delete();

    public abstract function fromArray(array $array);
}