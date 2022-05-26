<div>
    @if (in_array('create', $buttons))
        <button wire:click="$emit('createResource')" class="btn btn-primary">
            <i class="fas fa-plus"></i> Создать
        </button>
    @endif

    @if (in_array('save', $buttons))
        <button wire:click="$emit('saveResource')" class="btn btn-success">
            <i class="fas fa-save"></i> Сохранить
        </button>
    @endif

    @if (in_array('saveAndExit', $buttons))
        <button wire:click="$emit('saveAndExitResource')" class="btn btn-info">
            <i class="fas fa-check"></i> Сохранить и закрыть
        </button>
    @endif

    @if (in_array('cancel', $buttons))
        <button wire:click="$emit('cancelResource')" class="btn btn-secondary">
            <i class="fas fa-times"></i> Отменить
        </button>
    @endif

    @if (in_array('delete', $buttons))
        <button wire:click="$emit('deleteResource')" onclick="confirm('Подтвердите удаление') || event.stopImmediatePropagation();" class="btn btn-danger">
            <i class="fas fa-trash"></i> Удалить
        </button>
    @endif
</div>
