<?php

namespace App\View\Components;

use App\Models\Todo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Todo $todo
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-list');
    }
}
