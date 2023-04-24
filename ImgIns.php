<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require 'Database.php';
    $Database = new Database();
    $conn = $Database->dbConnection();

    $data = json_decode(file_get_contents("php://input"));

    $sql = sprintf("INSERT INTO img VALUES ('%s','%s')",$data->username,$data->imgloc);
    $stmt = $conn->stmt_init();

    if(!$stmt->prepare($sql)){
        echo json_encode([
            'Sucess' => 0,
            'Message' => "error with statement"
        ]);
        exit;
    };

    if($stmt->execute()){
        http_response_code(201);
        echo json_encode([
            'success' => 1,
            'message' => 'Data Inserted Successfully.'
        ]);
        $img_obj = fopen($data->imgloc,'w');
        fwrite($img_obj,$data->img_bin);
        exit;
    }
    
?>