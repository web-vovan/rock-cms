<?php

namespace WebVovan\RockCms\View\Components;

use App\Http\Livewire\ResourceList;
use Illuminate\View\Component;

class SelectColumn extends Component
{
    public string $classList;
    public bool $sortable;
    public ResourceList $resourceList;

    /**
     * Create a new component instance.
     *
     */
    public function __construct(ResourceList $resourceList)
    {
        $this->classList = '';
        $this->sortable = false;
        $this->resourceList = $resourceList;
    }

    public static function make(ResourceList $resourceList)
    {
        return new static($resourceList);
    }

    public function addClass(string $class)
    {
        $this->classList .= $class;
        return $this;
    }

    public function getLabel(): string
    {
        $checked = $this->resourceList->checkSelectAll ? 'checked' : '';
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
