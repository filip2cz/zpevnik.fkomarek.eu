// Funkce pro nastavení cookies
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Funkce pro získání hodnoty cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) == 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}

// Funkce pro smazání cookies
function deleteCookies(names) {
    for (var i = 0; i < names.length; i++) {
        document.cookie = names[i] + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
}

// Zkontrolujeme, zda uživatel již odklikl cookies
var cookieNotification = document.getElementById('cookie-notification');
var acceptButton = document.getElementById('accept-cookie');
var clearButton = document.getElementById('clear-cookie');

if (!getCookie('cookie_accepted')) {
    cookieNotification.style.display = 'block';
}

// Po kliknutí na tlačítko Souhlasím
acceptButton.addEventListener('click', function () {
    setCookie('cookie_accepted', 'true', 365); // Uložíme cookie na 1 rok
    cookieNotification.style.display = 'none';
});

// Po kliknutí na tlačítko Smazat cookies
clearButton.addEventListener('click', function () {
    deleteCookies(['cookie_accepted', 'darkMode']); // Smazání obou cookies
    location.reload(); // Obnovíme stránku
});
