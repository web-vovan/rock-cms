<?php

namespace WebVovan\RockCms\Http\Livewire\Partials;

use Livewire\Component;

class ResourceButtons extends Component
{
    public $buttons;

    public function mount($buttons)
    {
        $this->buttons = $buttons;
    }

    public function render()
    {
        return view('rock-cms::partials.resource-buttons')
            ->with([
                'buttons' => $this->buttons
            ]);
    }
}
