<?php
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "myDB";
$id = $_POST['id'];
$vardas = $_POST['name'];//['lauko pavadinimas']
$pavarde = $_POST['surname'];
$darbo_valandu_skaicius = $_POST['darbo_valandu_skaicius'];//['lauko pavadinimas']
$Virsvalandziai = $_POST['Virsvalandziai'];
$password = $_POST['password'];


try {
    if ($password != "Mantas1") {
        echo "Blogas slaptažodis";
    } else {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE vartotojas set NAME = '$vardas', surname = '$pavarde', darbo_valandu_skaicius = $darbo_valandu_skaicius, Virsvalandziai = $Virsvalandziai WHERE id = $id";
        // use exec() because no results are returned
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":vardas", $vardas);
        $stmt->bindParam(":pavarde", $pavarde);
        $stmt->execute();
        //$last_id = $conn->lastInsertId();
        //echo "New record created successfully. Last inserted ID is: " . $last_id;
        header("Location: ../3lapas/?id=$id");
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

unset($conn);