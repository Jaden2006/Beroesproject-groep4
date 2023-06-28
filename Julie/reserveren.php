<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reserveren.css">
    <script src="reserveren.js"></script>
    <title>Camping village</title>
</head>

<?php

$host = 'localhost:3307';
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
    <header>
        <nav>
            <ul>
                <li><a href="Home.html">Home</a></li>
                <li><a href="Locatie">Informatie</a></li>
                <li><a href="reserveren.php">Reserveren</a></li>
                <li><a href="beschikbaarheid.html">Beschikbaarheid</a></li>
                <li><button onclick="document.getElementById('id01').style.display='block'"
                        style="width:auto;">Login</button>
                </li>
            </ul>
        </nav>

        <div id="id01" class="modal">

            <form class="modal-content animate" action="/action_page.php" method="post">

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>

    </header>

    <article>
        <h1>Reserveren bij camping village?!</h1>
    </article>

    <main>
        <form method="post">
            <div class="elem-group">
                <label for="name">Uw naam</label>
                <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20}
                    required>
            </div>
            <div class="elem-group">
                <label for="email">Uw email</label>
                <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
            </div>
            <div class="elem-group">
                <label for="phone">Uw telefoonnummer</label>
                <input type="tel" id="phone" name="visitor_phone" placeholder="06 348 38 472"
                    pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
            </div>
            <hr>
            <div class="elem-group inlined">
                <label for="adult">Volwassenen</label>
                <input type="number" id="adult" name="total_adults" placeholder="2" min="1" required>
            </div>
            <div class="elem-group inlined">
                <label for="child">Kinderen</label>
                <input type="number" id="child" name="total_children" placeholder="2" min="0" required>
            </div>
            <div class="elem-group inlined">
                <label for="checkin-date">Check-in Datum</label>
                <input type="date" id="checkin_date" name="checkin_date" required>
            </div>
            <div class="elem-group inlined">
                <label for="checkout-date">Check-out Datum</label>
                <input type="date" id="checkout_date" name="checkout_date" required>
            </div>
            <hr>
            <div class="elem-group">
                <label for="message">Comments?</label>
                <textarea id="message" name="visitor_message" placeholder="Vertel ons nog iets belangrijk is."
                    required></textarea>
            </div>
            <button type="submit">Book</button>
        </form>
    </main>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["visitor_name"];
    $email = $_POST["visitor_email"];
    $telefoonnummer = $_POST["visitor_phone"];
    $volwassenen = $_POST["total_adults"];
    $kinderen = $_POST["total_children"];
    $checkin = $_POST["checkin_date"];
    $checkout = $_POST["checkout_date"];
    $comment = $_POST["visitor_message"];

    $gegevens = array($naam, $email, $telefoonnummer, $volwassenen, $kinderen, $checkin, $checkout, $comment);

    $stmt = $pdo->prepare("INSERT INTO reserveren (visitor_name, visitor_email, visitor_phone, total_adults, total_children, checkin_date, checkout_date, visitor_message) VALUES (?,?,?,?,?,?,?,?)");
    $resultaat = $stmt->execute($gegevens);

    echo "<form class=modal-content animatea<h1>$naam, je boeking is succesvol!</h1</form>";
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