<?php
namespace cakeflow\Dispatchers;

use cakeflow\Dispatchers\Events\Event;
use Illuminate\Container\Container;
use Illuminate\Routing\Route;

class ControllerDispatcher extends \Illuminate\Routing\ControllerDispatcher
{
    public function __construct()
    {
        parent::__construct(Container::getInstance());
    }
    public function dispatch(Route $route, $controller, $method)
    {
        $data = [
            'route' => &$route,
            'action' => $method,
        ];
        $controller->initialize();
        $res = $this->fireEvent(new Event('beforeFilter', $data), $controller);
        if($res) return $res;

        $res = $this->fireEvent(new Event('filter', $data), $controller);
        if($res) return $res;

        $res = $this->fireEvent(new Event('afterFilter', $data), $controller);
        if($res) return $res;

        $res = $this->fireEvent(new Event('beforeAction', $data), $controller);
        if($res) return $res;

        $res = parent::dispatch($route, $controller, $method);
        if($res) return $res;

        $res = $this->fireEvent(new Event('afterAction', $data), $controller);
        if($res) return $res;

        $res = $this->fireEvent(new Event('beforeRender', $data), $controller);
        if($res) return $res;

        $res = $this->fireEvent(new Event('render', $data), $controller);
        if($res) return $res;

        $res = $this->fireEvent(new Event('afterRender', $data), $controller);
        return $res;
    }
    public function fireEvent(Event $event, $controller)
    {
        if (method_exists($controller, $event->getName())) {
            return $controller->{$event->getName()}($event);
        }
    }
}
