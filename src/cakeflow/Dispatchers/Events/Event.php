<?php

namespace cakeflow\Dispatchers\Events;


class Event implements EventInterface
{

    protected bool $stopped=false;


    public function __construct(protected string $name, protected array $data=[])
    {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function get(string $key)
    {
        return $this->data[$key]??null;
    }

    public function set(string $key, mixed $value)
    {
        $this->data[$key]=$value;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function isStopped(): bool
    {
        return $this->stopped;
    }

    public function stop()
    {
        $this->stopped = true;
    }
    public function getName(): string
    {
        return $this->name;
    }
}
