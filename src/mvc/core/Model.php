<?php

namespace MVC\Core;

abstract class Model
{
    public abstract function insert(): bool;

    public abstract function update(): bool;

    public abstract function delete(): bool;

    public abstract function fromArray(array $array);
}