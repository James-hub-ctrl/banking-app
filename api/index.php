<?php

header('Content-Type :application/Json');
if($_SERVER ['REQUEST_METHOD'] ==='GET') {

    $response = array(

        $message='Hello world';
    );


    echo json_encode($response);

} else{
    http_response_code(405); //Method not allowed
    echo json_encode (array('error'  =>'Method not allowed')); 
}

?>

