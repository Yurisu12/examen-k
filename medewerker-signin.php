<?php

if (isset($_POST["submit2"])) {

    // Hier hal ik de data van index.php, wanneer er op submit geklikt wordt op sign up.
    $userid = $_POST["userid"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];
    $email = $_POST["email"];

    // Neem classes en functie voor sign up.
    include "database.php";
    include "signup-database.php";
    include "signup-checker.php";
    //linked to signup-checker.
    $signup = new SignupChecker($userid, $pwd, $pwd2, $email);

    //Error checker linked to signup-checker.php
    $signup->singupUser();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Placeholder</title>
    <div name="nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-page.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="medewerker-login.php">LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</head>
<br>
</head>

<body>
    <?php
    if (isset($_POST["submit2"])) {
    ?>
        <h1>Medewerker is account is gemaakt. Klik op Inloggen om in te loggen.</h1>
        <h2><a href="medewerker-login.php">Inloggen</a></h2>
    <?php
    } else {
    ?>
        <h1>Site with no styling "Yet"</h1>
        <br>
        <h4>Sign up</h4>
        <p>Sign me up!</p>
        <form action="medewerker-signin.php" method="post">
            <input type="text" name="userid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd2" placeholder="Repeat Password">
            <input type="text" name="email" placeholder="Email adres">
            <br>
            <button type="submit" name="submit2">SIGN UP</button>
        </form>

    <?php
    }

    ?>




</body>

</html>