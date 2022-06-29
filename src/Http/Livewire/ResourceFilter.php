<?php

namespace WebVovan\RockCms\Http\Livewire;

use Illuminate\Contracts\Database\Query\Builder;

abstract class ResourceFilter
{
    public ?Builder $builder;
    public ?array $filterFields;
    public $value;
    public string $field = '';
    public string $label = '';

    public function __construct(Builder $builder = null, array $filterFields = null)
    {
        $this->builder = $builder;
        $this->filterFields = $filterFields;
        $this->value = $this->filterFields[$this->field] ?? null;
    }

    public function apply()
    {
        if (isset($this->value) && $this->value !== 'null') {
            $this->builder();
        }
    }

    public abstract function builder();

    public abstract function render();
}
