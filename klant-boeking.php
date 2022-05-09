<?php
require_once 'r-procces.php';

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
<?php
$mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$result = $mysqli->query("SELECT * FROM klanten ORDER BY klant_id DESC LIMIT 1") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//pre_r($result);
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
                </tr>
            </thead>
            <?php $row = $result->fetch_assoc(); ?>
            <tr>
                <td><?php echo $row['r_periode_in']; ?></td>
                <td><?php echo $row['r_periode_out']; ?></td>
                <td><?php echo $row['klant_id']; ?></td>
                <td><?php echo $row['naam']; ?></td>
                <td><?php echo $row['adres']; ?></td>
                <td><?php echo $row['plaats']; ?></td>
                <td><?php echo $row['postcode']; ?></td>
                <td><?php echo $row['telefoon']; ?></td>
            </tr>
        </table>
        <form action="r-procces.php" method="post">
            <div class="form-group col-md-2">
                <input type='submit' name='export' value='Export to excel file' />
            </div>
        </form>
    </div>
</div>