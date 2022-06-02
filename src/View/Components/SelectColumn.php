<?php

namespace WebVovan\RockCms\View\Components;

use WebVovan\RockCms\Http\Livewire\ResourceListComponent;
use Illuminate\View\Component;

class SelectColumn extends Component
{
    public string $classList;
    public bool $sortable;
    public ResourceListComponent $resourceListComponent;

    /**
     * Create a new component instance.
     * @param ResourceListComponent $resourceListComponent
     */
    public function __construct(ResourceListComponent $resourceListComponent)
    {
        $this->classList = '';
        $this->sortable = false;
        $this->resourceListComponent = $resourceListComponent;
    }

    public static function make(ResourceListComponent $resourceListComponent)
    {
        return new static($resourceListComponent);
    }

    public function addClass(string $class)
    {
        $this->classList .= $class;
        return $this;
    }

    public function getLabel(): string
    {
        $checked = $this->resourceListComponent->checkSelectAll ? 'checked' : '';
        return '<input type="checkbox" wire:click="selectAllResources" '. $checked .'>';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('rock-cms::components.columns.select-column');
    }
}
