<?php

namespace cakeflow\Controllers\Components;

use cakeflow\Dispatchers\Events\EventInterface;
use Illuminate\Routing\Route;
use ReflectionClass;

class AuthComponent extends Component
{
    public function startup(EventInterface|null $event = null)
    {
        $reflectionClass = new ReflectionClass($this->controller);
        /* @var Route $route */
        $route = $event->get('route');
        $attributes = $reflectionClass->getMethod($route->getActionMethod())->getAttributes();
        dd($attributes);
    }
}
