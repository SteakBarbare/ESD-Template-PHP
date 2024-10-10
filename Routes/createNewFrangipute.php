<?php
$dbConfig = parse_ini_file("../config.env");

$host = $dbConfig["DB_HOST"];
$username = $dbConfig["DB_USERNAME"];
$password = $dbConfig["DB_PASSWORD"];
$dbName = $dbConfig["DB_NAME"];

try {
    $pdo = new PDO(
        'mysql:host=' . $host . ';dbname=' . $dbName,
        $username,
        $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
} catch (PDOException $e) {
    die("Can't connect to $dbName :" . $e->getMessage());
}

if (isset($_POST["amandes"]) && isset($_POST["quantity"])) {
    $amandes = $_POST["amandes"];
    $quantity = $_POST["quantity"];

    $request = $pdo->prepare('INSERT INTO frangipute (amandes, quantity) VALUES (:amandes, :quantity)');
    $request->bindParam(':amandes', $amandes, PDO::PARAM_STR);
    $request->bindParam(':quantity', $quantity, PDO::PARAM_STR);

    $amande = $request->execute();
} else {
    echo "Mets tes paramètres fdp";
}
