<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

try {
    $id = $_GET['id'];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, name, surname, darbo_valandu_skaicius, Virsvalandziai FROM vartotojas WHERE id = $id");
    $stmt->execute();
    $rezultatas = $stmt->fetchAll();
    echo json_encode($rezultatas[0]);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
unset($conn);