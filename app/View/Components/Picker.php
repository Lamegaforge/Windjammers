<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Picker extends Component
{
    /**
     * Picker items.
     *
     * @var array
     */
    public $items;
    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.picker');
    }
}
