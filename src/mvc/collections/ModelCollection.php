<?php

namespace MVC\Collections;

class ModelCollection
{
    const ITEM_CLASS = '';

    /**
     * @var array
     */
    protected $elements = [];

    public function add(Model $model): self
    {
        $this->elements[] = $model;

        return $this;
    }

    public function fromArray(array $array): self
    {
        $itemClass = static::ITEM_CLASS;

        return self::make(
            array_map(
                function ($item) use ($itemClass) {
                    /** @var Model $itemObj */
                    $itemObj = new $itemClass();
                    return $itemObj->fromArray($item);
                },
                $array
            )
        );
    }

    public static function make(array $items): ModelCollection
    {
        $collection = new static();

        foreach ($items as $item) {
            $collection->add($item);
        }

        return $collection;
    }

    /**
     * @return array
     */
    public function getElements(): array
    {
        return $this->elements;
    }


}