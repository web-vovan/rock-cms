<?php

namespace WebVovan\RockCms\View\Components;

use Illuminate\View\Component;

class Column extends Component
{
    public string $label;
    public string $field;
    public string $classList;
    public bool $sortable;

    /**
     * Create a new component instance.
     *
     * @param string $field
     * @param string|null $label
     */
    public function __construct(string $field, ?string $label = null)
    {
        $this->field = $field;
        $this->label = $label ?? $field;
        $this->classList = '';
        $this->sortable = false;
    }

    public static function make(string $field, ?string $label = null): static
    {
        return new static($field, $label);
    }

    public function addClass(string $class)
    {
        $this->classList .= $class;
        return $this;
    }

    public function sortable(): static
    {
        $this->sortable = true;
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
        return view('rock-cms::components.columns.column')->with([
            'field' => $this->field,
            'label' => $this->label,
            'classList' => $this->classList,
            'sortable' => $this->sortable,
        ]);
    }
}
