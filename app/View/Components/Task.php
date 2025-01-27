<?php

namespace App\View\Components;

use App\Models\Task as TaskModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Task extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public TaskModel $item)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.task');
    }
}
