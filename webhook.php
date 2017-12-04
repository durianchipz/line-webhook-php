<?php
function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => "Hello from webhook",
            "displayText" => "Hello from webhook",
            "contextOut" => array()
        ));
    } else if($update["result"]["action"] == "input.greeting"){
		error_log("hello, this is a test! in input.greetig");
		sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => "Hello from webhook",
            "displayText" => "Hello from webhook php test :)",
            "contextOut" => array()
        ));
	} else {
		error_log("hello, this is a test! in else");
	}
}

function sendMessage($parameters) {
    echo json_encode($parameters);
}

$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}
?>