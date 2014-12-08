<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$file_name = $request->fileName;
$json_data = json_encode($request->jsonData);

$return_message = "";
$filehandle = fopen("data/" . $file_name, "w");
if(!fwrite($filehandle, $json_data)){ // getting an error right here!!!
	header("HTTP/1.1 500 Internal Server Error");
	$return_message = "Error, data not written to storage...";
} else {
	header("HTTP/1.1 200 OK");
	$return_message = "Data was successfully saved!";
}

fclose($filehandle);
echo json_encode("Service returned with: " + $return_message + " Data was: " + $file_name + "\n" + $json_data);

?>
