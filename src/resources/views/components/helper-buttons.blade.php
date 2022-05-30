<div wire:click="saveResource" id="saveResourceFormButton" class="d-none">save</div>
<div wire:click="saveAndExitResource" id="saveAndExitResourceFormButton" class="d-none">saveAndExit</div>
@isset($routeRedirect)
<div wire:click="delete({{ $id }}, '{{ $routeRedirect }}')" id="deleteResourceFormButton" class="d-none">delete</div>
@endisset
