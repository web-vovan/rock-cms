<?php

namespace WebVovan\RockCms\View\Components;

class ReplaceColumn extends Column
{
    public array $replaceItems = [];

    public function setReplaceItems(array $items)
    {
        $this->replaceItems = $items;
        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('rock-cms::components.columns.replace-column')->with([
            'field' => $this->field,
            'label' => $this->label,
            'classList' => $this->classList,
            'sortable' => $this->sortable,
            'replaceItems' => $this->replaceItems,
        ]);
    }
}
