<?php
require_once 'r-procces.php';

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
<br><br>

<body>

    <div class="container">
        <form action="r-procces.php" method="post">
            <h3>Reservier nu</h3>
            <div class="from-group row">
                <div class="form-group col-md-6">
                    <label>Check In</label>
                    <input type="date" name="startid" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Check Out</label>
                    <input type="date" name="endid" class="form-control">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Naam</label>
                <input type="text" class="form-control" name="naam">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Adres</label>
                    <input type="text" class="form-control" name="adres">
                </div>
                <div class="form-group col-md-4">
                    <label>Plaats</label>
                    <input type="text" class="form-control" name="plaats">
                </div>
                <div class="form-group col-md-2">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="postcode">
                </div>
                <div class="form-group col-md-2">
                    <label>Telefoon</label>
                    <input type="text" class="form-control" name="telefoon">
                </div>
            </div>
            <div class="form-group">
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Reservier</button>
            </div>
        </form>
    </div>

</body>

</html>