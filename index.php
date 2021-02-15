<?php
// Read the variables sent via POST from AT gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome Mr Thandile Jwambi, to Loxin Worx porting services. Would you like to port your mobile number? \n";
    $response .= "1. Yes \n";
    $response .= "2. No";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Your are about to port your SIM card \n";
    $response .= "1. Please enter your SIM card PIN";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Mr Jwambi, your port request has been declined.";

} else if($text == "1*1") { 
    // This is a terminal request. Note how we start the response with END
    $response = "END Thank Mr Jwambi, your mobile number has been ported succesfully. Please insert your new SIM card into your mobile phone.";
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

?>
