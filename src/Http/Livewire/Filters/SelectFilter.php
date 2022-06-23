<?php

namespace WebVovan\RockCms\Http\Livewire\Filters;

use WebVovan\RockCms\Http\Livewire\ResourceFilter;

abstract class SelectFilter extends ResourceFilter
{
    public array $data = [];

    public function render()
    {
        return view('filters.select-filter', [
            'field' => $this->field,
            'label' => $this->label,
            'data' => $this->data,
        ]);
    }
}
