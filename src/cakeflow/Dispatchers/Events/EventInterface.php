<?php

namespace cakeflow\Dispatchers\Events;

interface EventInterface
{
    public function getData();
    public function get(string $key);
    public function set(string $key, mixed $value);
    public function setData(array $data);
    public function isStopped(): bool;
    public function stop();

}
