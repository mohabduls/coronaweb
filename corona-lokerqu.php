<?php
header("Content-type: application/json");
$url = "https://api.kawalcorona.com/";
$data = file_get_contents($url);
echo $data;
?>