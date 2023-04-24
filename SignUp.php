<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require 'Database.php';
    $Databse = new Database();
    $conn = $Databse->dbConnection();

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

?>