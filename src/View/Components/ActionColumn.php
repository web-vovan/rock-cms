<?php

namespace WebVovan\RockCms\View\Components;

use Illuminate\View\Component;

class ActionColumn extends Component
{
    public string $label;
    public string $classList;
    public bool $sortable;

    /**
     * Create a new component instance.
     *
     * @param string $label
     */
    public function __construct(string $label)
    {
        $this->label = $label;
        $this->classList = '';
        $this->sortable = false;
    }

    public static function make(string $label = '')
    {
        return new static($label);
    }

    public function addClass(string $class)
    {
        $this->classList .= $class;
        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('rock-cms::components.columns.action-column')->with([
            'label' => $this->label,
        ]);
    }
}
