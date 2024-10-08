<?php
// Načtení obsahu souboru song.json
$json = file_get_contents('song.json');

// Parsování JSON do PHP pole
$song = json_decode($json, true);

// Získání dat z JSON
$nazev = isset($song['nazev']) ? $song['nazev'] : 'bez názvu';
$nazevPopis = isset($song['nazevPopis']) ? $song['nazevPopis'] : '';
$autor = isset($song['autor']) ? $song['autor'] : 'neznámé';
$akordy = isset($song['akordy']) ? $song['akordy'] : '';
$akordyText = isset($song['akordyText']) ? $song['akordyText'] : $akordy;
$zdroj = isset($song['zdroj']) ? $song['zdroj'] : '';
$zdrojText = isset($song['zdrojText']) ? $song['zdrojText'] : $zdroj;
$zdrojPopis = isset($song['zdrojPopis']) ? $song['zdrojPopis'] : '';
$invidious = isset($song['invidious']) ? $song['invidious'] : '';
$invidiousText = isset($song['invidiousText']) ? $song['invidiousText'] : 'Invidious';
$youtube = isset($song['youtube']) ? $song['youtube'] : '';
$youtubeText = isset($song['youtubeText']) ? $song['youtubeText'] : 'YouTube';
$soundcloud = isset($song['soundcloud']) ? $song['soundcloud'] : '';
$soundcloudText = isset($song['soundcloudText']) ? $song['soundcloudText'] : 'SoundCloud';
$spotify = isset($song['spotify']) ? $song['spotify'] : '';
$spotifyText = isset($song['spotifyText']) ? $song['spotifyText'] : 'Spotify';
$genericPlatform1 = isset($song['genericPlatform1']) ? $song['genericPlatform1'] : '';
$genericPlatform1Text = isset($song['genericPlatform1Text']) ? $song['genericPlatform1Text'] : 'Další platforma 1';
$genericPlatform2 = isset($song['genericPlatform2']) ? $song['genericPlatform2'] : '';
$genericPlatform2Text = isset($song['genericPlatform2Text']) ? $song['genericPlatform2Text'] : 'Další platforma 2';

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
    <?php include("../include/bootstrap.html") ?>

    <?php include("../include/css.html") ?>

    <div class="container">

        <a href="../"><button class="btn btn-primary" type="button">Zpět</button></a>

        <h1 class="center nadpis"><?php echo htmlspecialchars($nazev); ?></h1>

        <?php if (!empty($nazevPopis)): ?>
            <p class="center"><?php echo htmlspecialchars($nazevPopis); ?></a></p>
        <?php endif; ?>

        <p class="center">Autor: <?php echo htmlspecialchars($autor); ?></p>

        <?php if (!empty($akordy)): ?>
            <p class="center">Akordy: <a href="<?php echo htmlspecialchars($akordy); ?>"
                    target="_blank"><?php echo htmlspecialchars($akordyText); ?></a></p>
        <?php elseif (!empty($akordyText)): ?>
            <p class="center">Akordy: <?php echo htmlspecialchars($akordyText); ?></a></p>
        <?php endif; ?>

        <div id="songText"><?php echo $escaped_text; ?></div>

        <br>

        <p class="center">
            <?php if (!empty($invidious)): ?>
                <a href="<?php echo htmlspecialchars($invidious); ?>"
                    target="_blank"><?php echo htmlspecialchars($invidiousText); ?></a>
            <?php endif; ?>

            <?php if (!empty($youtube)): ?>
                <?php if (!empty($invidious)): ?> | <?php endif; ?>
                <a href="<?php echo htmlspecialchars($youtube); ?>"
                    target="_blank"><?php echo htmlspecialchars($youtubeText); ?></a>
            <?php endif; ?>

            <?php if (!empty($soundcloud)): ?>
                <?php if (!empty($invidious) || !empty($youtube)): ?> | <?php endif; ?>
                <a href="<?php echo htmlspecialchars($soundcloud); ?>"
                    target="_blank"><?php echo htmlspecialchars($soundcloudText); ?></a>
            <?php endif; ?>

            <?php if (!empty($spotify)): ?>
                <?php if (!empty($invidious) || !empty($youtube) || !empty($soundcloud)): ?> | <?php endif; ?>
                <a href="<?php echo htmlspecialchars($spotify); ?>"
                    target="_blank"><?php echo htmlspecialchars($spotifyText); ?></a>
            <?php endif; ?>

            <?php if (!empty($genericPlatform1)): ?>
                <?php if (!empty($invidious) || !empty($youtube) || !empty($soundcloud) || !empty($spotify)): ?> |
                <?php endif; ?>
                <a href="<?php echo htmlspecialchars($genericPlatform1); ?>"
                    target="_blank"><?php echo htmlspecialchars($genericPlatform1Text); ?></a>
            <?php endif; ?>

            <?php if (!empty($genericPlatform2)): ?>
                <?php if (!empty($invidious) || !empty($youtube) || !empty($soundcloud) || !empty($spotify) || !empty($genericPlatform1)): ?>
                    | <?php endif; ?>
                <a href="<?php echo htmlspecialchars($genericPlatform2); ?>"
                    target="_blank"><?php echo htmlspecialchars($genericPlatform2Text); ?></a>
            <?php endif; ?>
        </p>

        <p class="center">Zdroj: <a href="<?php echo htmlspecialchars($zdroj); ?>"
                target="_blank"><?php echo htmlspecialchars($zdrojText); ?></a></p>

        <?php if (!empty($zdrojPopis)): ?>
            <p class="center"><?php echo htmlspecialchars($zdrojPopis); ?></p>
        <?php endif; ?>
    </div>

</body>

</html>