// Funkce pro nastavení cookie
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Funkce pro získání hodnoty cookie
function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Funkce pro vykreslení tlačítka do stránky
function renderToggleButton() {
    const container = document.getElementById("toggleAkordy");
    if (!container) return;

    const savedState = getCookie("akordy");
    const isActive = savedState === "true";

    container.innerHTML = `<button id="toggleButton" class="btn btn-primary" type="button">${isActive ? "Skrýt akordy" : "Zobrazit akordy"}</button>`;

    const toggleButton = document.getElementById("toggleButton");
    toggleButton.addEventListener("click", function () {
        setCookie("akordy", !isActive, 30); // Uložení na 30 dní
        location.reload(); // Reload stránky
    });
}

// Inicializace při načtení stránky
document.addEventListener("DOMContentLoaded", renderToggleButton);