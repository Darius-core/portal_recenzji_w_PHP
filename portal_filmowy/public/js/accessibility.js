document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    document.getElementById('toggle-contrast')?.addEventListener('click', () => {
        body.classList.toggle('high-contrast');
    });

    document.getElementById('font-plus')?.addEventListener('click', () => {
        body.classList.remove('font-normal');
        body.classList.add('font-large');
    });

    document.getElementById('font-normal')?.addEventListener('click', () => {
        body.classList.remove('font-large');
        body.classList.add('font-normal');
    });
});