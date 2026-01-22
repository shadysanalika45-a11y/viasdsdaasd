// Laravel Mix entry point for global dashboard behavior.
document.addEventListener('DOMContentLoaded', () => {
    const flashes = document.querySelectorAll('[data-flash]');
    flashes.forEach((flash) => {
        flash.classList.add('is-visible');
    });
});
