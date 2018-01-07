<?php

$name = $_POST["name"];
$addr = $_POST["addr"];

$json = json_decode(file_get_contents("json.json"));

/*
if (!isset($json)) {
	$json = (object)array("links" => new stdClass(), "projects" => new stdClass(), "things" => new stdClass(), "purchases" => new stdClass());
}
*/

$json->links->$name = $addr;
echo json_encode([$name, $addr]);

file_put_contents("json.json", json_encode($json));

?>