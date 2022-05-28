<?php

namespace App\Http\Livewire\RockCms\Partials;

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
        return view('livewire.rock-cms.partials.resource-buttons')
            ->with([
                'buttons' => $this->buttons
            ]);
    }
}
