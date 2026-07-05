document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    if (passwordInput && togglePassword) {
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    }

    document.querySelectorAll('form').forEach(function (form) {
        form.addEventListener('submit', function () {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) {
                overlay.classList.add('show');
            }
        });
    });

    const flashMessage = document.querySelector('[data-flash-message]');
    if (flashMessage) {
        const toastContainer = document.getElementById('toastContainer');
        if (toastContainer) {
            const toast = document.createElement('div');
            toast.className = 'toast align-items-center text-bg-primary border-0 show';
            toast.setAttribute('role', 'alert');
            toast.innerHTML = '<div class="d-flex"><div class="toast-body">' + flashMessage.getAttribute('data-flash-message') + '</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>';
            toastContainer.appendChild(toast);
            setTimeout(function () {
                toast.remove();
            }, 4000);
        }
    }

    window.addEventListener('load', function () {
        const overlay = document.getElementById('loadingOverlay');
        if (overlay) {
            overlay.classList.remove('show');
        }
    });
});
