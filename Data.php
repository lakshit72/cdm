<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");

    require 'Database.php';
    $Database = new Database();
    $conn = $Database->dbConnection();

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    $sql = $decoded->username == "" ? sprintf("SELECT * FROM img WHERE USERNAME = '%s'",$decoded->username):"SELECT * FROM img";

    $stmt = $conn->stmt_init();
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetch_assoc();

    echo json_encode([
        "Success" => 1,
        "Data" => $data
    ]);
    exit;
?>