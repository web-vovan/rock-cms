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
        body: 'Ресурс удален',
        "class": 'bg-danger',
        title: false,
        autohide: true,
        delay: 2500,
        close: false
    });
});
window.addEventListener('resources-delete', function (event) {
    $(document).Toasts('create', {
        body: 'Ресурсы удалены',
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

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
        alwaysShowClose: true,
    });
});
