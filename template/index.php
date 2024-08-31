<?php
// Načtení obsahu souboru song.json
$json = file_get_contents('song.json');

// Parsování JSON do PHP pole
$song = json_decode($json, true);

// Získání dat z JSON
$nazev = isset($song['nazev']) ? $song['nazev'] : 'bez názvu';
$autor = isset($song['autor']) ? $song['autor'] : 'neznámé';
$akordy = isset($song['akordy']) ? $song['akordy'] : 'neznámé';
$zdroj = isset($song['zdroj']) ? $song['zdroj'] : 'neznámé';
$invidious = isset($song['invidious']) ? $song['invidious'] : '';
$youtube = isset($song['youtube']) ? $song['youtube'] : '';
$soundcloud = isset($song['soundcloud']) ? $song['soundcloud'] : '';
$spotify = isset($song['spotify']) ? $song['spotify'] : '';

// Načtení obsahu souboru text.txt
$text = file_get_contents('text.txt');

// Bezpečné zobrazení obsahu (např. kódování speciálních HTML znaků)
$escaped_text = htmlspecialchars($text);
?>

<!DOCTYPE html>
<html lang='cs' data-bs-theme="dark">

<head>
    <title>Zpěvník: <?php echo htmlspecialchars($nazev); ?> - <?php echo htmlspecialchars($autor); ?></title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <meta charset='utf-8'>
</head>

<body>
    <!-- CSS a JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="../amoled.css" id="dark-mode-stylesheet">

    <!-- Support pro mobilní menu -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="container">

        <a href="../"><button class="btn btn-primary" type="button">Zpět</button></a>

        <h1 class="center nadpis"><?php echo htmlspecialchars($nazev); ?></h1>

        <p class="center">Autor: <?php echo htmlspecialchars($autor); ?></p>

        <p class="center">Akordy: <a href="<?php echo htmlspecialchars($akordy); ?>"
                target="_blank"><?php echo htmlspecialchars($akordy); ?></a></p>

        <pre id="text"><?php echo $escaped_text; ?></pre>

        <p class="center">
            <?php if (!empty($invidious)): ?>
                <a href="<?php echo htmlspecialchars($invidious); ?>" target="_blank">Invidious</a>
            <?php endif; ?>

            <?php if (!empty($youtube)): ?>
                <?php if (!empty($invidious)): ?> | <?php endif; ?>
                <a href="<?php echo htmlspecialchars($youtube); ?>" target="_blank">YouTube</a>
            <?php endif; ?>

            <?php if (!empty($soundcloud)): ?>
                <?php if (!empty($invidious) || !empty($youtube)): ?> | <?php endif; ?>
                <a href="<?php echo htmlspecialchars($soundcloud); ?>" target="_blank">SoundCloud</a>
            <?php endif; ?>

            <?php if (!empty($spotify)): ?>
                <?php if (!empty($invidious) || !empty($youtube) || !empty($soundcloud)): ?> | <?php endif; ?>
                <a href="<?php echo htmlspecialchars($spotify); ?>" target="_blank">Spotify</a>
            <?php endif; ?>
        </p>

        <p class="center">Zdroj: <a href="<?php echo htmlspecialchars($zdroj); ?>" target="_blank"><?php echo htmlspecialchars($zdroj); ?></a></p>

    </div>

</body>

</html>