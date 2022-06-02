<?php

namespace WebVovan\RockCms\View\Components;

class EditLinkColumn extends Column
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('rock-cms::components.columns.edit-link-column')->with([
            'field' => $this->field,
            'label' => $this->label,
            'classList' => $this->classList,
            'sortable' => $this->sortable,
        ]);
    }
}
