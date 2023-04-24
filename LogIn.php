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

    $sql = sprintf("SELECT * FROM user WHERE USERNAME = '%s'",$decoded["username"]);

    $stmt = $conn->stmt_init();
    $stmt->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = $res->fetch_assoc();
    
    if($data){
        
        $pass = $data['PASSWORD'];

        if($pass == $decoded["Password"]){
            http_response_code(200);
            echo json_encode([
                "Sucess" => 1,
                "Msg" => "Login Sucessfull"
            ]);
            exit;
        }else{
            http_response_code(400);
            echo json_encode([
                "Sucess" => 0,
                "msg" => "Incorrect Password"
            ]);
            exit;
        }
    }else{
        http_response_code(404);
        echo json_encode([
            "Sucess" => 0,
            "msg" => "No user exists with this username"
        ]);
        exit;
    }

?>