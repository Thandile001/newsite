<?php
// Read the variables sent via POST from AT gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Hello! Would you like to port your mobile number? \n";
    $response .= "1. Yes \n";
    $response .= "2. No";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Your are about to port your SIM car \n";
    $response .= "1. Please enter your SIM PIN";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Your port request has been declined";

} else if($text == "1*1") { 
    // This is a terminal request. Note how we start the response with END
    $response = "END Your mobile number has been ported, please insert your new SIM car";
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

?>
