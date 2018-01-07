<?php

$name = $_POST["name"];

$json = json_decode(file_get_contents("json.json"));

unset($json->links->$name);
echo $name;

file_put_contents("json.json", json_encode($json));

?>