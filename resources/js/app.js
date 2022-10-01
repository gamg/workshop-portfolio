import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* Sweetalert 2 */
const GeneralSwal = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

const DeleteConfirmSwal = Swal.mixin({
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3f3f46',
    cancelButtonColor: '#ef4444'
});

/* Events */
window.addEventListener('notify', event => {
    GeneralSwal.fire({
        icon: 'success',
        title: event.detail.message
    })
})

window.addEventListener('deleteit', event => {
    DeleteConfirmSwal.fire({
        title: event.detail.title,
        text: event.detail.text,
        confirmButtonText: event.detail.confirmText,
        cancelButtonText: event.detail.cancelText
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit(event.detail.eventName, event.detail.id)
        }
    });
});

window.addEventListener('deleteMessage', event => {
    Swal.fire({
        confirmButtonColor: '#3f3f46',
        icon: 'success',
        title: event.detail.message,
    });
});
