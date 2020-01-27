<?php

namespace Framework;

//On écrit une classe abstraite qui hydrate les classes filles

abstract class Entity
{
    private $id;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
