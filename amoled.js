// Funkce pro nastavení režimu (dark mode)
function setDarkMode() {
    const body = document.body;
    body.classList.add('dark-mode');

    // Uložení informace o režimu do cookies
    document.cookie = "darkMode=enabled; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/;";
}

// Funkce pro vypnutí režimu (světlý režim)
function unsetDarkMode() {
    const body = document.body;
    body.classList.remove('dark-mode');

    // Smazání informace o režimu z cookies
    document.cookie = "darkMode=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;";
}

// Zjistit stav dark mode z cookies a případně jej aktivovat
function checkDarkModeCookie() {
    const darkModeCookie = document.cookie.split('; ').find(cookie => cookie.startsWith("darkMode="));

    if (darkModeCookie) {
        const enabled = darkModeCookie.split('=')[1] === 'enabled';
        if (enabled) {
            setDarkMode();
        }
    }
}

// Zjistit stav cookies při načtení stránky
checkDarkModeCookie();

// Přidat posluchače události pro tlačítko
const darkModeButton = document.getElementById('dark-mode-button');
darkModeButton.addEventListener('click', () => {
    const body = document.body;
    if (body.classList.contains('dark-mode')) {
        unsetDarkMode();
    } else {
        setDarkMode();
    }
});
