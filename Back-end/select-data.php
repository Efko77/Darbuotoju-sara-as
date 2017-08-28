<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, name, surname FROM vartotojas");
    $stmt->execute();
    $rezultatas=$stmt->fetchAll();
    echo json_encode($rezultatas);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
unset($conn);



