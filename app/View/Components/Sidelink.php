<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidelink extends Component
{
    public $route;
    public $icon;
    public $label;

    public function __construct($route, $icon, $label)
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.sidelink');
    }
}
