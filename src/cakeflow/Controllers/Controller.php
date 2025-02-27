<?php

namespace cakeflow\Controllers;

use cakeflow\Dispatchers\Events\EventInterface;

abstract class Controller
{
    protected array $components = [];
    public function initialize(){}
    public function loadComponent(string $name, array $config=[])
    {
        $this->components[$name] = new $name($this, $config);
    }
    public function beforeFilter(EventInterface $event){}
    public function filter(EventInterface $event)
    {
        foreach ($this->components as &$component){
            $res = $component->startup($event);
            if($res) return $res;
        }
    }
    public function afterFilter(EventInterface $event){}
    public function beforeAction(EventInterface $event){}
    public function afterAction(EventInterface $event){}
    public function beforeRender(EventInterface $event){}
    public function afterRender(EventInterface $event){}
}
