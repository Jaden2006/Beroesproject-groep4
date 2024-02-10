<!DOCTYPE html>
<html>

<head>
    <title>Campingbeheer</title>
    <link rel="stylesheet" href="beschikbaarheid.css">
</head>
<?php

$host = 'localhost:3306';
$db = 'Camping Village';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
?>
<body>

    
    <h2> Hello Admin </h2>

    <h1>Campingbeheer</h1>

    <form>
        <label for="plekken">Aantal beschikbare plekken:</label>
        <input type="number" id="plekken" name="plekken" min="0">
        <button type="submit" id="opslaan">Opslaan</button>
    </form>

    <script>
        // Eventlistener voor het formulier
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault(); // Voorkomt dat de pagina wordt vernieuwd

            // Haal de waarde van het inputveld op
            var aantalPlekken = document.getElementById('plekken').value;

            // Stuur de waarde naar de server (hier simuleren we het opslaan)
            // Je kunt deze waarde vervangen door een API-aanroep om het naar een server te sturen
            console.log('Aantal plekken opgeslagen: ' + aantalPlekken);
        });
    </script>

    <?php

$data = $pdo->query("SELECT * FROM reserveren")->fetchAll();

foreach ($data as $row) {
    echo "naam: " . $row['visitor_name'] . "<br />\n";
    echo "email: " . $row['visitor_email'] . "<br />\n";
    echo "telefonnnummer: " . $row['visitor_phone'] . "<br />\n";
    echo "adults: " . $row['total_adults'] . "<br />\n";
    echo "children: " . $row['total_children'] . "<br />\n";
    echo "check in: " . $row['checkin_date'] . "<br />\n";
    echo "check ot: " . $row['checkout_date'] . "<br />\n";
    echo "message: " . $row['visitor_message'] . "<br />\n";
    echo "-----------------------------------". "<br /><hr>";
}
?>

<footer>
        <div class="contact">
            <p>Locatie: pittoreske Otterlo</p>
            <p>Emailadres: Campingvillage@gmail.com</p>
            <p>Telefoonnummer: 020 633782347</p>
        </div>
    </footer>
</body>

</html>