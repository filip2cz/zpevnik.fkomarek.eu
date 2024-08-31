#!/bin/bash

# Funkce pro zpracování PHP souboru a jeho konverzi na HTML
process_php_to_html() {
    php_file="$1"
    php_dir=$(dirname "$php_file")  # Získá adresář souboru
    php_base=$(basename "$php_file")  # Získá název souboru (např. index.php)
    html_file="${php_base%.php}.html"

    # Pokud je soubor ve složce include, přeskočí zpracování
    if [[ "$php_dir" == *"/include" ]]; then
        echo "Ignorováno: $php_file"
        return
    fi

    # Uložení původní cesty
    original_dir=$(pwd)

    # Přejde do adresáře s PHP souborem
    cd "$php_dir" || { echo "Nelze přejít do složky $php_dir"; exit 1; }

    # Spustí PHP soubor a uloží výstup do HTML
    php "$php_base" > "$html_file"

    # Zkontroluje, jestli byl soubor úspěšně převeden
    if [ -f "$html_file" ]; then
        echo "Převedeno: $php_file -> $php_dir/$html_file"

        # Smaže původní PHP soubor
        rm "$php_base"
        echo "Smazáno: $php_file"
    else
        echo "Chyba při převodu: $php_file"
    fi

    # Vrátí se zpět do původní složky
    cd "$original_dir"
}

# Prohledá všechny index.php soubory ve složce a podadresářích
find . -name "index.php" | while read php_file; do
    process_php_to_html "$php_file"
done

echo "Všechny PHP soubory byly úspěšně převedeny a původní PHP soubory smazány."

# https://answers.netlify.com/t/directory-listing/14246/6