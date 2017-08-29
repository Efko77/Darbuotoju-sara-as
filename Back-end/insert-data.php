<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$vardas = $_POST['name'];//['lauko pavadinimas']
$pavarde = $_POST['surname'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO vartotojas (name, surname) VALUES (:vardas, :pavarde)";
    // use exec() because no results are returned
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":vardas", $vardas);
    $stmt->bindParam(":pavarde", $pavarde);
    $stmt->execute();
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

unset($conn);