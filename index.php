<?php
// Funkce pro čtení názvu písničky z JSON souboru
function getSongTitle($jsonFilePath) {
    if (!file_exists($jsonFilePath)) {
        return null;
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $data = json_decode($jsonContent, true);
    return $data['nazev'] ?? null;
}

// Funkce pro čtení alternativních názvů z textového souboru
function getAlternativeTitles($txtFilePath) {
    if (!file_exists($txtFilePath)) {
        return [];
    }
    $titles = file($txtFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('trim', $titles);
}

// Cesta k hlavní složce s písničkami
$baseDir = __DIR__; // Pokud je index.php ve stejném adresáři jako složky s písničkami

// Array pro uchování názvů písniček a jejich cest
$songs = [];

// Prohledání všech složek v základním adresáři
foreach (scandir($baseDir) as $folder) {
    $folderPath = $baseDir . '/' . $folder;
    if (is_dir($folderPath) && $folder !== '.' && $folder !== '..' && $folder !== 'template') {
        $jsonFilePath = $folderPath . '/song.json';
        $txtFilePath = $folderPath . '/names.txt';

        // Získání hlavního názvu z JSON souboru
        $title = getSongTitle($jsonFilePath);

        // Získání alternativních názvů z textového souboru
        $alternativeTitles = getAlternativeTitles($txtFilePath);

        // Pokud máme alternativní názvy, použijeme je, jinak použijeme hlavní název
        if (!empty($alternativeTitles)) {
            foreach ($alternativeTitles as $altTitle) {
                $songs[] = [
                    'title' => $altTitle,
                    'folder' => $folder
                ];
            }
        } elseif ($title) {
            $songs[] = [
                'title' => $title,
                'folder' => $folder
            ];
        }
    }
}

// Seřazení písniček podle názvu
usort($songs, function($a, $b) {
    return strcmp($a['title'], $b['title']);
});

?>

<!DOCTYPE html>
<html lang='cs' data-bs-theme="dark">

<head>
    <title>Zpěvník</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <meta charset='utf-8'>
</head>

<body>
    <?php include("./include/bootstrap.html") ?>

    <?php include("./include/css.html") ?>

    <div class="container">

        <h1 class="center nadpis">Zpěvník</h1>

        <p class="center">Web je stále ve výstavbě, nicméně zde už je pár písniček:</p>

        <p class="center">
            Novinka: přechod z Javascriptu na PHP (rychlejší a spolehlivější web pro Vás), černé pozadí
            jako výchozí, opuštění cookies
        </p>

        <ul>
            <?php foreach ($songs as $song): ?>
                <li class="songs-list"><a
                        href="<?php echo htmlspecialchars($song['folder'] . '/index.php'); ?>"><?php echo htmlspecialchars($song['title']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <br>

        <p class="center"><a href="jak-pridat/">Jak přidat píseň</a></p>

</body>

</html>