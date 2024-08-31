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

        <!-- https://cs.wikipedia.org/wiki/Abeceda#%C4%8Cesk%C3%A1_abeceda -->


        <!--

        <ul>
            <?php foreach ($songs as $song): ?>
                <li class="songs-list"><a
                        href="<?php echo htmlspecialchars($song['folder'] . '/index.php'); ?>"><?php echo htmlspecialchars($song['title']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        -->

        <!-- <p class="center"><a href="odkaz">nazev</a></p> -->

        <p class="center"><a href="bastila/">Bastila</a></p>

        <p class="center"><a href="batalion/">Batalion</a></p>

        <p class="center"><a href="dlazebni-kostka/">Dlažební kostka </a></p>

        <p class="center"><a href="drak/">Drak</a></p>

        <p class="center"><a href="jdou-po-mne-jdou/">Jdou po mně jdou</a></p>

        <p class="center"><a href="kluziste/">Kluziště</a></p>

        <p class="center"><a href="kockoholky/">Kočkoholky</a></p>

        <p class="center"><a href="letecky-most/">Letecký most</a></p>

        <p class="center"><a href="batalion/">Markytánka</a></p>

        <p class="center"><a href="planeta-hieronyma-bosche-ii/">Planeta Hieronyma Bosche II</a></p>

        <p class="center"><a href="rada-se-miluje/">Ráda se miluje</a></p>

        <p class="center"><a href="slavici/">Slavíci z Madridu</a></p>

        <p class="center"><a href="soutez/">Soutěž</a></p>

        <p class="center"><a href="stanky/">Stánky</a></p>

        <p class="center"><a href="tri-krize/">Tři kříže</a></p>

        <p class="center"><a href="tri-krize-hakovy/">Tři kříže (hákový)</a></p>

        <p class="center"><a href="batalion/">Tourdion</a></p>

        <p class="center"><a href="zlaty-hrebik-noci/">Zlatý hřebík noci</a></p>

        <br>

        <p class="center"><a href="jak-pridat/">Jak přidat píseň</a></p>

</body>

</html>