<!DOCTYPE html>
<html lang='cs' data-bs-theme="dark">

<head>
    <title>zpěvník</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <meta charset='utf-8'>
</head>

<body>
    <?php include("../include/bootstrap.html") ?>

    <?php include("../include/css.html") ?>

    <div class="container">

        <a href="./"><button class="btn btn-primary" type="button">Zpět</button></a>

        <h1 class="nadpis">Jak přidat písničku</h1>

        <h2>Mám Github účet a umím dělat pull requesty</h2>

        <ol>
            <li>Udělejte si fork repozitáře <a href="https://github.com/filip2cz/zpevnik.fkomarek.eu"
                    target="_blank">https://github.com/filip2cz/zpevnik.fkomarek.eu</a>.</li>
            <li>Zkopírujte složku template.</li>
            <li>Do text.txt v té nové složce dejte text písně.</li>
            <li>Do song.json v té nové složce doplňte název písně, autora, odkaz na akordy, zdroj textu a platformy, kde si uživatel může píseň přehrát.</li>
            <li>Do index.html ve hlavní složce dejte odkaz na složku s písní, dodržte abecední pořadí.</li>
        </ol>

        <h2>Mám Github účet, ale neumím dělat pull requesty nebo html</h2>

        <p>Vytvořte issue pro přidání písně na odkaze <a
                href="https://github.com/filip2cz/zpevnik.fkomarek.eu/issues/new?assignees=&labels=p%C5%99id%C3%A1n%C3%AD+p%C3%ADsn%C4%9B&projects=&template=p%C5%99id%C3%A1n%C3%AD-p%C3%ADsn%C4%9B.md&title=P%C5%99id%C3%A1n%C3%AD+p%C3%ADsn%C4%9B%3A"
                target="_blank">https://github.com/filip2cz/zpevnik.fkomarek.eu/issues/new?assignees=&labels=p%C5%99id%C3%A1n%C3%AD+p%C3%ADsn%C4%9B&projects=&template=p%C5%99id%C3%A1n%C3%AD-p%C3%ADsn%C4%9B.md&title=P%C5%99id%C3%A1n%C3%AD+p%C3%ADsn%C4%9B%3A</a>
        </p>


        <h2>Nemám Github účet</h2>

        <p>Vyplňte následující formulář:
            <a href="https://forms.gle/tqejtqF6Xjh943NT6">https://forms.gle/tqejtqF6Xjh943NT6</a>
        </p>

    </div>

</body>

</html>