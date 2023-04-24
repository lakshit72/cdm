<?php
$content = trim(file_get_contents("php://input"));

//this content should be a json already
//{"first_name":"first name","last_name":"last name"}

//if want to access values
$_arr = json_decode($content, true);

//do what ever you want to do with first_name and last_name

//after you are done, be sure to send back a json
echo json_encode($_arr);
exit();