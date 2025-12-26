<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    public string $className;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title, public string $route, public mixed $params = [])
    {
        $this->className = $this->getClasses(route($route, $params, false));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.nav-item');
    }

    public function isCurrentRoute($route)
    {
        $path = request()->path();
        $trimmed_route = ltrim($route, "/");

        return $path === '/' ? $path === $route : request()->is($trimmed_route, "$trimmed_route/*");
    }

    public function getClasses($route)
    {
        return $this->isCurrentRoute($route)
            ? 'text-primary bg-red-50 border-b-4 border-primary'
            : 'text-gray-800 hover:text-primary hover:bg-gray-50';
    }
}
