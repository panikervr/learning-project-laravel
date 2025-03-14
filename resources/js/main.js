const toastContent = document.querySelector('.toast');
const toast = new bootstrap.Toast(toastContent);
toast.show();

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
