const container = document.querySelector('.container');

window.addEventListener('load', () => {
    const currentTheme = localStorage.getItem('websiteTheme');
    if (currentTheme && currentTheme === 'dark') {
        container.classList.add('dark-container');
    }
});

document.querySelector('.light-theme').addEventListener('click', () => {
    container.classList.remove('dark-container');
    localStorage.removeItem('websiteTheme');
});

document.querySelector('.dark-theme').addEventListener('click', () => {
    container.classList.add('dark-container');
    localStorage.setItem('websiteTheme', 'dark');
});
