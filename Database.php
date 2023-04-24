<?php
    class Database{
        private $db_host = 'localhost:3306';
        private $db_name = 'cdm';
        private $db_username = 'root';
        private $db_password = '123';

        public function dbConnection(){
            $conn = new mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);

            if ($conn->connect_errno){
                http_response_code(400);
                header('Content-Type: text/plain');
                echo $conn->connect_error;
            }else{
                return $conn;
                exit;
            }
            
        }
    }
?>