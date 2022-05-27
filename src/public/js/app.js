/**
 * Toasts
 */
window.addEventListener('resource-update', function (event) {
    $(document).Toasts('create', {
        body: 'Успешно сохранено',
        "class": 'bg-success',
        title: false,
        autohide: true,
        delay: 2500,
        close: false
    });
});
window.addEventListener('resource-create', function (event) {
    $(document).Toasts('create', {
        body: 'Успешно создано',
        "class": 'bg-success',
        title: false,
        autohide: true,
        delay: 2500,
        close: false
    });
});
window.addEventListener('resource-delete', function (event) {
    $(document).Toasts('create', {
        body: 'Объект удален',
        "class": 'bg-danger',
        title: false,
        autohide: true,
        delay: 2500,
        close: false
    });
});
window.addEventListener('error-validation', function (event) {
    $(document).Toasts('create', {
        body: 'Ошибка валидации',
        "class": 'bg-danger',
        title: false,
        autohide: true,
        delay: 2500,
        close: false
    });
});

function ready() {
    // открытие в модальном окне картинок для вариантов блоков проекта
    let typeButtons = document.querySelectorAll('button.modalTypeImage')

    for (let i = 0; i < typeButtons.length; i++) {
        typeButtons[i].addEventListener('click', function (event) {
            let image = document.querySelector('#modalTypeImage img');
            image.src = this.dataset.image

            $('#modalTypeImage').modal('show')
        })
    }
}

document.addEventListener("DOMContentLoaded", ready);

// Открытие модального окна с компонентом
window.addEventListener('openComponentModal', function (event) {
    $('#componentModal').modal('show')
});

// Закрытие модального окна с компонентом
window.addEventListener('hideComponentModal', function (event) {
    $('#componentModal').modal('hide')
});

