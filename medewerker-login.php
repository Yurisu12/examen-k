<?php
require_once 'r-procces.php';
if (isset($_POST["submit3"])) {

    // Hier hal ik de data van index.php, wanneer er op submit geklikt wordt op sign up.
    $userid = $_POST["userid"];
    $pwd = $_POST["pwd"];

    // Neem classes en functie voor sign up.
    include "database.php";
    include "login-database.php";
    include "login-checker.php";
    //linked to signup-checker.
    $login = new LoginChecker($userid, $pwd);

    //Error checker linked to login-checker.php
    $login->loginUser();

    /*gaat terug naar medewerker-login.php
    header("location: medewerker-login.php?error=none");*/
}
?>
<?php

if (isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_SESSION["userid"])) {
    ?>
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
                        <li class="nav-item">
                            <a class="nav-link p-2" href="logout.php">LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <h1>Welcome <?php echo $_SESSION["useruserid"]; ?> you are now sign in!</h1>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $result = $mysqli->query("SELECT * FROM klanten") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $totalRows = $result->num_rows;
        //print_r($totalRows);
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Kamer Nummer</th>
                            <th>Naam</th>
                            <th>Adres</th>
                            <th>Plaats</th>
                            <th>Postcode</th>
                            <th>Telefoon</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['r_periode_in']; ?></td>
                            <td><?php echo $row['r_periode_out']; ?></td>
                            <td><?php echo $row['klant_id']; ?></td>
                            <td><?php echo $row['naam']; ?></td>
                            <td><?php echo $row['adres']; ?></td>
                            <td><?php echo $row['plaats']; ?></td>
                            <td><?php echo $row['postcode']; ?></td>
                            <td><?php echo $row['telefoon']; ?></td>
                            <td>
                                <a href="medewerker-login.php?edit=<?php echo $row['klant_id'] ?>" class="btn btn-info">Edit</a>
                                <a href="r-procces.php?delete=<?php echo $row['klant_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
                <form action="r-procces.php" method="post">
                    <div class="form-group col-md-2">
                        <input type='submit' name='export1' value='Export to excel file' />
                    </div>
                </form>
            </div>
            <br><br>
            <form action="r-procces.php" method="post">
                <input type="hidden" name="klant_id" value="<?php echo $klant_id; ?>">
                <div class="from-group row">
                    <div class="form-group col-md-6">
                        <label>Check In</label>
                        <input type="date" name="startid" value="<?php echo $checkin; ?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Check Out</label>
                        <input type="date" name="endid" value="<?php echo $checkin; ?>" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Naam</label>
                    <input type="text" class="form-control" name="naam" value="<?php echo $name; ?>" placeholder="Voer je Naam in">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Adres</label>
                        <input type="text" class="form-control" name="adres" value="<?php echo $adres; ?>" placeholder="Voer je adres in">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Plaats</label>
                        <input type="text" class="form-control" name="plaats" value="<?php echo $plaats; ?>" placeholder="Plaats">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="postcode" value="<?php echo $postcode; ?>" placeholder="Postcode">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Telefoon</label>
                        <input type="text" class="form-control" name="telefoon" value="<?php echo $telefoon; ?>" placeholder="Telefoon nummer">
                    </div>
                </div>
                <div class="form-group">
                    <br>
                    <?php
                    if ($update == true) :
                    ?>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <?php else : ?>
                        <button type=" submit" class="btn btn-primary" name="submit3">Reservier</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>

    <?php
    } else {
    ?>
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
        <h1>Site with no styling "Yet"</h1>
        <br>
        <h4>Log in</h4>
        <form action="medewerker-login.php" method="post">
            <input type="text" name="userid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <br>
            <p><a href="medewerker-signin.php">Sign In</a></p>
            <button type="submit" name="submit3">LOGIN</button>

        </form>
    <?php
    }

    ?>

</body>

</html>