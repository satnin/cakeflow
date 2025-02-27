<?php

namespace cakeflow\Controllers\Components;

use cakeflow\Dispatchers\Events\EventInterface;
use cakeflow\Controllers\Controller;

abstract class Component
{
    public function __construct(protected Controller &$controller, protected array $config=[])
    {
        $this->initialize();
    }

    protected function initialize(){}
    public function startup(EventInterface|null $event=null){}
}
