<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$klant_id = 0;
$update = false;
$checkin = "";
$checkout = "";
$name = "";
$adres = "";
$plaats = "";
$postcode = "";
$telefoon = "";

if (isset($_POST["submit"])) {

    // Hier hal ik de data van r-klant.php.
    $checkin = $_POST["startid"];
    $checkout = $_POST["endid"];
    $name = $_POST["naam"];
    $adres = $_POST["adres"];
    $plaats = $_POST["plaats"];
    $postcode = $_POST["postcode"];
    $telefoon = $_POST["telefoon"];

    $mysqli->query("INSERT INTO klanten (r_periode_in, r_periode_out, naam, adres, plaats, postcode, telefoon) VALUES('$checkin', '$checkout', '$name', '$adres', '$plaats', '$postcode', '$telefoon')") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $_SESSION['message'] = "Record is opgeslagen!";
    $_SESSION['msg_type'] = "success";

    header("location: klant-boeking.php");
} elseif (isset($_POST["submit3"])) {

    // Hier hal ik de data van medewerker.php.
    $checkin = $_POST["startid"];
    $checkout = $_POST["endid"];
    $name = $_POST["naam"];
    $adres = $_POST["adres"];
    $plaats = $_POST["plaats"];
    $postcode = $_POST["postcode"];
    $telefoon = $_POST["telefoon"];

    $mysqli->query("INSERT INTO klanten (r_periode_in, r_periode_out, naam, adres, plaats, postcode, telefoon) VALUES('$checkin', '$checkout', '$name', '$adres', '$plaats', '$postcode', '$telefoon')") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    header("location: medewerker-login.php");
}


//delete knop functie
if (isset($_GET['delete'])) {
    $klant_id = $_GET['delete'];
    $mysqli->query("DELETE FROM klanten WHERE klant_id=$klant_id") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $_SESSION['message'] = "Record is verwijderd!";
    $_SESSION['msg_type'] = "danger";

    header("location: medewerker-login.php");
}

//edit data functie
if (isset($_GET['edit'])) {
    $klant_id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM klanten WHERE klant_id=$klant_id") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $checkin = $row['r_periode_in'];
        $checkout = $row['r_periode_out'];
        $name = $row['naam'];
        $adres = $row['adres'];
        $plaats = $row['plaats'];
        $postcode = $row['postcode'];
        $telefoon = $row['telefoon'];
    }
}

//update data functie
if (isset($_POST['update'])) {
    $klant_id = $_POST['klant_id'];
    $checkin = $_POST['r_periode_in'];
    $checkout = $_POST['r_periode_out'];
    $name = $_POST['naam'];
    $adres = $_POST['adres'];
    $plaats = $_POST['plaats'];
    $postcode = $_POST['postcode'];
    $telefoon = $_POST['telefoon'];

    $mysqli->query("UPDATE klanten SET r_periode_in='$checkin', r_periode_out='$checkout', naam='$name', adres='$adres', plaats='$plaats', postcode='$postcode', telefoon='$telefoon'  WHERE klant_id=$klant_id") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $_SESSION['message'] = "Data is geupdate!";
    $_SESSION['msg_type'] = "warning";

    header("location: medewerker-login.php");
}

//alert voor kamers
$mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$result = $mysqli->query("SELECT * FROM klanten") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$totalRows = $result->num_rows;
if ($totalRows == 8) {
    $_SESSION['message'] = "Nog 2 kamer beschikbaar!";
    $_SESSION['msg_type'] = "warning";

    //header("location: medewerker-login.php");
}

//excel export klant
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM klanten ORDER BY klant_id DESC LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
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
  ';
        $row = $result->fetch_assoc(); {
            $output .= '
   <tr>
   <td>' . $row['r_periode_in'] . '</td>
   <td>' . $row['r_periode_out'] . '</td>
   <td>' . $row['klant_id'] . '</td>
   <td>' . $row['naam'] . '</td>
   <td>' . $row['adres'] . '</td>
   <td>' . $row['plaats'] . '</td>
   <td>' . $row['postcode'] . '</td>
   <td>' . $row['telefoon'] . '</td>
   </tr>      
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Reservering.xls');
        echo $output;
    }
}

//excel export medewerker
$output = '';
if (isset($_POST["export1"])) {
    $query = "SELECT * FROM klanten";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
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
  ';
        while ($row = $result->fetch_assoc()) : {
                $output .= '
   <tr>
   <td>' . $row['r_periode_in'] . '</td>
   <td>' . $row['r_periode_out'] . '</td>
   <td>' . $row['klant_id'] . '</td>
   <td>' . $row['naam'] . '</td>
   <td>' . $row['adres'] . '</td>
   <td>' . $row['plaats'] . '</td>
   <td>' . $row['postcode'] . '</td>
   <td>' . $row['telefoon'] . '</td>
   </tr>      
   ';
            }
        endwhile;
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Reservering Lijst.xls');
        echo $output;
    }
}
